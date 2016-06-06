<?php
namespace App;




class Bootstrap
{
    private $_config              = array();
    public $middlewarelist        = array();

    public function __construct($config = array()){
        $this->_config = $config;
    }

    /*
    |--------------------------------------------------------------------------
    | ִ��
    |--------------------------------------------------------------------------
    */
    public static function Run($approot = '../App/')
    {
        !defined('APPROOT')     && define('APPROOT', $approot);
         !defined('ADDONSROOT')  && define('ADDONSROOT', '../Addons/');

        //��ʼ��
        self::Ini();

        //����·��ִ�п���������
        self::ControllerRun();
    }

    public static function Ini()
    {
        //set error handler
        set_error_handler(array('\App\Bootstrap', 'customError'));      //�Զ��������

        /*ϵͳ������*/
        dc(\Grace\Vo\Vo::getInstance(self::load(APPROOT.'Config/Vo.php'))->ObjectConfig['Config']);

        if (dc('debug')) {
            //���󱨸�
            ini_set('error_reporting', dc('error_reporting'));
        } else {
            //�������κδ���
            error_reporting(0);
        }

        //ʱ��
        $timezone = dc('Env')['default_timezone']?:'Asia/Shanghai';
        ini_set('date.timezone',$timezone);

        //d(app('req')->get);        //D(app('req')->get);        //����req������
        $get = app('req')->get;
        $controller = $get['c']?:(isset($get['C'])?$get['C']:'');
        $controller = $controller?:dc('App')['DefaultController'];

        $mothed = $get['a']?:(isset($get['A'])?$get['A']:'');
        $mothed = $mothed?:dc('App')['DefaultControllerMethod'];

        req([                   //req ����ģ��
            'Get'   => app('req')->get,
            'Post'  => app('req')->post,
            'Env'   => app('req')->env,
            'Router'=> [
                'type'      => app('req')->env['REQUEST_METHOD'],
                'controller'    => ucfirst(strtolower($controller)),
                'mothed'        => ucfirst(strtolower($mothed)),
                'params'        =>  app('req')->get['params'],
                'Prefix'        => dc('App')['DefaultControllerMethodPrefix'],
            ],
        ]);
        //ok,·���ֶ����ú���
    }

    public static function ControllerRun()
    {
        $router = req('Router');
        //·�����ݺϷ��Լ��
        if (!preg_match('/^[0-9a-zA-Z]+$/',$router['controller']) || !preg_match('/^[0-9a-zA-Z]+$/',$router['mothed']))
        {
            halt('router error');
        }
        if (!preg_match('/^[a-zA-Z]+$/',substr($router['controller'],0,1)) || !preg_match('/^[a-zA-Z]+$/',substr($router['mothed'],0,1)))
        {
            halt('router error2');
        }

        $params = $router['params'];                                              //����
        /*
         * �������п��ܳ�Ϊ�ļ���������,���Ҽ���
         * */
        //�������� just
        $_controller    = $router['controller'];
        //������ just
        $_mothed       = $router['mothed'];

        //����_ִ��
        $__mothedAction = ($router['type'] == 'GET')?($router['Prefix'].$router['mothed']):($router['Prefix'].$router['mothed'].ucfirst(strtolower($router['type'])));

        //������_ִ��
        $__controllerAction = '\App\Controller\\'.$router['controller'];

        //��������Ŀ¼
        $basepath =       APPROOT.'Controller/';

        /*
        1 : base
        2 : controller/action
        3 : controller/contgroller
        4 : controller.php
         * */
        //���ػ��� - ����������,�����
        $file = $basepath.$_controller.'/BaseController.php';
        includeIfExist($file);

        //controller/action.php
        $file = $basepath.$_controller.'/'.$_mothed.'.php';
        includeIfExist($file);
$_file[] = $file;
        //Ѱ����չ����
        if(!method_exists($__controllerAction, $__mothedAction)){
            //û��Ѱ�ҵ�,���� controller/controller.php
            $file = $basepath.$_controller.'/'.$_controller.'.php';
$_file[] = $file;
            includeIfExist($file);
        }

        //controller/action.php
        if(!method_exists($__controllerAction, $__mothedAction)){
            //����û���ҵ�,���� controller.php
            $file = $basepath.$_controller.'.php';
$_file[] = $file;
            includeIfExist($file);
        }

        //�����û��
        //������
        if(!method_exists($__controllerAction, $__mothedAction)){
            //û���ҵ�ִ�з���
            //ִ��404;
            echo 'Miss file : <br>';
            echo $__controllerAction;
            echo '::'.$__mothedAction;
            D($_file);
        }

        //ʵ����
        $controller = new $__controllerAction();

        if(!method_exists($__controllerAction, 'behaviors')) {
            $controller->behavior = $controller->behaviors();       //����behaviorִ��ǰ���õ�hook
        }

        if(!method_exists($__controllerAction, 'actions')) {
            $controller->actions = $controller->actions();       //����behaviorִ��ǰ���õ�hook
        }

        //����actionִ����صĲ���
        $controller->$__mothedAction($params);         //ִ�з���
    }


    public static  function customError($errno, $errstr, $errfile, $errline)
    {
        echo "<b>Custom error:</b><br> [$errno] $errstr<br />";
        echo " Error on line $errline <br>in $errfile<br />";
        echo "Ending Script";
        die();
    }

    public static function load($file=''){
        if(file_exists($file)){
            return include $file;
        }
        return [];
    }

}


