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
         * 1 : 视图
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
         * 模型
         * */
//        Model('Form')->run();

        /*
         * 数据流
         * */
//        D(req());
//        D(dc());
//        D(sc());
//        D(bus());

        /*
         * 基础对象调用
         * */
        //app('db')->go();

        /*
        中间件
        插件
        hook
        部件
        */


    }

}
