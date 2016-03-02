<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('Europe/London');

define('LAYOUT_PATH', dirname(__FILE__) . '/layout');
define('TEMPLATE_PATH', dirname(__FILE__) . '/template');
define('ENV', 'development');

require_once("admin/application.php");

/***
 * This function is complete mess. Fix it!
 * @param $content
 * @param int $paragraph_number
 * @param bool $skip
 * @return bool|mixed|string
 */
function get_paragraphed_content($content, $paragraph_number = 0, $skip = false)
{
    if ($paragraph_number == 0) {
        return $content;
    }
    if (strpos($content, '</p>')) {
        $paragraphs = explode('</p>', $content);
        $remove = '<p>';
    } elseif (strpos($content, '\n')) {
        $paragraphs = explode('\n', $content);
    } elseif (strpos($content, '<br/>')) {
        $paragraphs = explode('<br/>', $content);
    } elseif (strpos($content, '.')) {
        $paragraphs = explode('.', $content);
    } else {
        return $content;
    }

    if ($skip == true) {
        //skip certain paragraphs
        if (isset($paragraphs[$paragraph_number - 1])) {
            unset($paragraphs[$paragraph_number - 1]);
            $paragraphs = array_values($paragraphs);
        }
        return sprintf('<p>%s</p>', implode('</p><p>', $paragraphs));
    }

    if (is_array($paragraph_number)) {
        if (count($paragraph_number) == 2) {
            $from = $paragraph_number[0];
            $to = $paragraph_number[1];
        } else {
            $from = $paragraph_number[0];
            $to = $from + 1;
        }
        $new = array_chunk($paragraphs, $to - $from + 1);
        if (isset($new[$from - 1])) {
            return implode("\n", $new[$from - 1]);
        }
        return implode("\n", $paragraphs);
    } else {
        if (!isset($paragraphs[$paragraph_number - 1])) {
            return false;
        }
        return isset($remove) ? str_replace($remove, '', $paragraphs[$paragraph_number - 1]) : $paragraphs[$paragraph_number - 1];
    }
}


function get_sentence($content, $num = 1)
{
    $content = explode('.', strip_tags($content));
    $content = array_chunk($content, $num);
    $content = $content[0];
    return implode('. ', $content) . '.';
}

/**
 * Doctype of the page
 * @param string $type
 */
function doctype($type = 'html5')
{
    //only html5 support at the moment.
    switch (strtolower($type)) {
        case 'html5':
            echo '<!DOCTYPE html>';
            break;
    }
}

/**
 * Echo data
 * @param $data
 * @param bool $decode
 */
function _e($data, $decode = true)
{
    echo $decode == true ? html_entity_decode($data) : $data;
}

/**
 * Output an HTML tag
 * @param $tag
 * @param bool $id
 * @param bool $class
 * @param array $attrs
 */
function __($tag, $id = false, $class = false, $attrs = array())
{
    $out = sprintf('<%s ', strtolower($tag));
    if (!empty($attrs)) {
        if (isset($attrs['class']) && false != $class) {
            unset($attrs['class']);
        }
        if (isset($attrs['id']) && false != $id) {
            unset($attrs['id']);
        }
        foreach ($attrs as $key => $val) {
            if (is_numeric($key)) {
                continue;
            }
            $out .= sprintf(' %s="%s"', $key, $val);
        }
    }
    if ($class != false) {
        $out .= sprintf(' class="%s"', $class);
    }
    if ($id != false) {
        $out .= sprintf(' id="%s"', $id);
    }
    if (in_array($tag, array('img', 'input', 'br', 'link', 'meta'))) {
        $out .= '/';
    }
    $out = rtrim($out, ' ');
    $out .= '>';

    _e($out);
}

/**
 * Output a tab with content inside it
 * @param $tag
 * @param $content
 * @param array $attrs
 * @return string
 */
function _t($tag, $content, $attrs = array())
{
    return __($tag, false, false, $attrs) . _e($content) . __('/' . $tag);
}