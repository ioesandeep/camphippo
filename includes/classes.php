<?php
/**
 * Class Site
 * Class to hold site information
 */
class Site
{
    protected static $data = array();

    /**
     * Initialize the class data
     */
    public static function init()
    {
        $data = table_fetch_rows('site_data');
        foreach ($data as $d) {
            $name = preg_replace('/\s+/', '_', strtolower($d['name']));
            self::$data[$name] = $d['value'];
        }
    }

    /**
     * Access any member of the class statically.
     * @param $item
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($item, $arguments)
    {
        if (empty(self::$data)) {
            self::init();
        }

        if (isset(self::$data[$item])) {
            return self::$data[$item];
        }

        return false;
    }
}

/**
 * Class Lang
 * The language class
 */
class Lang
{
    protected static $lang = array();

    public static function init()
    {
        self::$lang = require_once dirname(__FILE__) . '/lang.php';
    }

    /**
     * Access any member of the class statically.
     * @param $item
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($item, $arguments)
    {
        if (empty(self::$lang)) {
            self::init();
        }

        if (isset(self::$lang[$item])) {
            return self::$lang[$item];
        }

        return false;
    }
}