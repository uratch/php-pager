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

    /**
     * @dataProvider dataProvider
     */
    public function testGet($total, $page, $cur, $min, $max)
    {
        $pager = $this->Pager->Get($total, $page);
        $this->assertEquals($cur, $pager['cur']);
        $this->assertEquals($min, $pager['min']);
        $this->assertEquals($max, $pager['max']);
    }

    public function dataProvider()
    {
        return [
          [20387, 1, 1, 1, 5],
          [20387, 2, 2, 1, 5],
          [20387, 3, 3, 1, 5],
          [20387, 4, 4, 2, 6],
          [20387, 5, 5, 3, 7],
          [50, 6, 1, 1, 5],
          [51, 6, 6, 2, 6],
          [51, 5, 5, 2, 6],
          [51, 4, 4, 2, 6],
          [51, 3, 3, 1, 5],
          [51, 2, 2, 1, 5],
          [51, 1, 1, 1, 5],
          [0,  6, 1, 1, 1],
          [0,  -1, 1, 1, 1],
          [20, -2, 1, 1, 2],
          [20, 1, 1, 1, 2],
          [20, 2, 2, 1, 2],
          [20, 3, 1, 1, 2],
          [3,  2, 1, 1, 1],
          [3,  0, 1, 1, 1],
          [3,  1, 1, 1, 1],
          [3, -1, 1, 1, 1],
          [-1, 1, 1, 1, 1],
        ];
    }
}
