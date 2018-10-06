<?php
/**
 * @package Pager
 * @author uratch
 */
class Pager
{
    /**
     * setting option
     */
    private $_allowed_options = array('limit_listing', 'limit_pages');

    /**
     * @var int [ for example. 10 , 20 , 30 , 100 ]
     */
    private $_limit_listing = 10;

    /**
     * @var int [ for example. 10=>1.2.3.4.5.6.7.8.9.10 , 5=>1.2.3.4.5 ]
     */
    private $_limit_pages = 5;

    /**
     * constructor
     *
     * @param array $options : allowed $_allowed_options
     * @access public
     */
    public function __construct($options = array())
    {
        foreach ($options as $k => $v) {
            if (in_array($k, $this->_allowed_options)) {
                $this->{'_'.$k} = $v;
            }
        }
    }

    /**
     * @param int $total
     * @param int $page
     * @access public
     * @return array
     */
    public function Get($total, $page)
    {
        $max_page         = (int)ceil($total / $this->_limit_listing);
        $limit_pages_half = (int)round($this->_limit_pages / 2);

        /* current page. */
        if ($page > $max_page || $page < 1) {
            $cur = 1;
        } else {
            $cur = $page;
        }

        /* minimum & maximum page. */
        if ($max_page <= $this->_limit_pages) {
            $min = 1;
            $max = ($max_page === 0) ? 1 : $max_page;
        } else {
            if ($cur <= $limit_pages_half) {
                $min = 1;
                $max = $this->_limit_pages;
            } else {
                $min = $cur - $limit_pages_half + 1;
                $max = $min + $this->_limit_pages - 1;

                if ($max > $max_page) {
                    $max = $max_page;
                    $min = $max - $this->_limit_pages + 1;
                }
            }
        }

        $retval        = array();
        $retval['cur'] = $cur;
        $retval['min'] = $min;
        $retval['max'] = $max;
        return $retval;
    }
}
