<?php
namespace App\Controller;


class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function doIndex()
    {


        $sql = "select * from million where userId<10";
        $res = app('db')->getAll($sql);

        D($res);




        /*
         * 1 : ��ͼ
         */
//        view('');
//        view('index');
//        view('index',[]);

//smarty
//        app('smarty')->display('../te',[
//        'Name'      => 'yan2g',
//            'FirstName' => array("John", "Mary", "James", "Henry")
//        ]);


        /*
         * ģ��
         * */
//        Model('Form')->run();

        /*
         * ������
         * */
//        D(req());
//        D(dc());
//        D(sc());
//        D(bus());

        /*
         * �����������
         * */
        //app('db')->go();

        /*
        �м��
        ���
        hook
        ����
        */


    }

}
