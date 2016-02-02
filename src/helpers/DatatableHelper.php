<?php namespace Arxmin\helpers;

use Arx\classes\Helper;

/**
 * Class DatagridHelper
 *
 * @package Arxmin\helpers
 */
class DatatableHelper extends Helper {

    public static function format($data, $key = 'id'){

        $i = 0;
        $increment = false;

        if ($key == false) {
            $increment = true;
        }

        return array_map(function($item) use($key, &$i, $increment) {
            if ($increment) {
                $item['DT_RowId'] = $i;
                $i++;
            } else {
                $item['DT_RowId'] = $item[$key];
            }
            return $item;
        }, $data);
    }
}