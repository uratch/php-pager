<?php

/*
 * $ pwd
 * {project_root}
 *
 * $ ./vendor/bin/phpunit tests/PagerTest
 *
 */

require 'src/pager.php';

class PagerTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->Pager = new Pager();
    }

    public function testGet()
    {
        /* 
         * set test array 
         *
         * [ total, page, cur, min, max ]
         */
        $arr[] = array(20387, 1, 1, 1, 5);
        $arr[] = array(20387, 2, 2, 1, 5);
        $arr[] = array(20387, 3, 3, 1, 5);
        $arr[] = array(20387, 4, 4, 2, 6);
        $arr[] = array(20387, 5, 5, 3, 7);
        $arr[] = array(50, 6, 1, 1, 5);
        $arr[] = array(51, 6, 6, 2, 6);
        $arr[] = array(51, 5, 5, 2, 6);
        $arr[] = array(51, 4, 4, 2, 6);
        $arr[] = array(51, 3, 3, 1, 5);
        $arr[] = array(51, 2, 2, 1, 5);
        $arr[] = array(51, 1, 1, 1, 5);
        $arr[] = array(0,  6, 1, 1, 1);
        $arr[] = array(0,  -1, 1, 1, 1);
        $arr[] = array(20, -2, 1, 1, 2);
        $arr[] = array(20, 1, 1, 1, 2);
        $arr[] = array(20, 2, 2, 1, 2);
        $arr[] = array(20, 3, 1, 1, 2);
        $arr[] = array(3,  2, 1, 1, 1);
        $arr[] = array(3,  0, 1, 1, 1);
        $arr[] = array(3,  1, 1, 1, 1);
        $arr[] = array(3, -1, 1, 1, 1);
        $arr[] = array(-1, 1, 1, 1, 1);

        foreach ($arr as $k => $v) {
            $pager = $this->Pager->Get($arr[$k][0], $arr[$k][1]);
            $this->assertEquals($arr[$k][2], $pager['cur']);
            $this->assertEquals($arr[$k][3], $pager['min']);
            $this->assertEquals($arr[$k][4], $pager['max']);
        }
    }
}
