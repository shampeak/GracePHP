<?php


/*
E:\phpleague\Grace\Grace.so>phpunit --bootstrap vendor/autoload.php tests/Vo/Votest.php
PHPUnit 4.8.7 by Sebastian Bergmann and contributors.
 * */
class MoneyTest extends PHPUnit_Framework_TestCase
{
    public function testcreate()
    {
        !defined('APPROOT')     && define('APPROOT', '../App/');
        $vo = Grace\Vo\Vo::getInstance([
            'FileReflect'    => [
                'Config'    => '../App/Config/Config.php',
            ],
            'Providers'=>[
                'Req'       => Grace\Req\Req::class,             //
            ],
        ]);
    }

    public function testcreatemakeob()
    {
        !defined('APPROOT')     && define('APPROOT', '../App/');
        $vo = Grace\Vo\Vo::getInstance([
            'FileReflect'    => [
                'Config'    => '../App/Config/Config.php',
            ],
            'Providers'=>[
                'Req'       => Grace\Req\Req::class,             //
            ],
        ])->make('req');
    }

    public function testcreatemakemodel()
    {
        !defined('APPROOT')     && define('APPROOT', '../App/');
        $vo = Grace\Vo\Vo::getInstance([
            'FileReflect'    => [
                'Config'    => '../App/Config/Config.php',
            ],
            'Providers'=>[
            ],
        ])->makeModel('\App\Model\formmodel');
    }



}

