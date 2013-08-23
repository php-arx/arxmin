<?php
/**
 * Arxmin.php.
 *
 * @project : esa
 * @author : Daniel Sum <daniel@cherrypulp.com>
 */

namespace Arx\Arxmin;


use Arx\classes\Asset;

class Arxmin {
    public static function asset($path){
        Asset::add($path);
    }
}