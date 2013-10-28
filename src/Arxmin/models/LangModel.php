<?php
/**
 * LangModel.php.
 *
 * @project : arx-contrib
 * @author : Daniel Sum <daniel@cherrypulp.com>
 */

namespace Arxmin;


use Arx\classes\App;
use Illuminate\Support\Collection;
use Illuminate\Support\NamespacedItemResolver;
use Symfony\Component\Translation\MessageSelector;
use Symfony\Component\Translation\TranslatorInterface;

class LangModel extends \Lang {

    /**
     * Little hack to the get function to change recursively when lang return an array and have a replace array
     *
     * @param string $key
     * @param array  $replace
     * @param null   $locale
     *
     * @return array|string
     */
    public static function get($key, $replace = array(), $locale = null){

        $reponse = parent::get($key, $replace, $locale);

        if(is_array($reponse) && !empty($replace)){
            $app = App::getInstance();
            array_walk_recursive($reponse, function(&$item, $key, $params){
                list($replace, $app) = $params;
                $item = self::_makeReplacements($item, $replace);
            }, array($replace, $app) );
        }

        return $reponse;
    }


    /**
     * Make the place-holder replacements on a line.
     *
     * @param  string  $line
     * @param  array   $replace
     * @return string
     */
    public static function _makeReplacements($line, array $replace)
    {
        $replace = self::_sortReplacements($replace);

        foreach ($replace as $key => $value)
        {
            $line = str_replace(':'.$key, $value, $line);
        }

        return $line;
    }

    /**
     * Sort the replacements array.
     *
     * @param  array  $replace
     * @return array
     */
    public static function _sortReplacements(array $replace)
    {
        return with(new Collection($replace))->sortBy(function($r)
        {
            return mb_strlen($r) * -1;
        });
    }

}