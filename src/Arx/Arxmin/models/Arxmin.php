<?php
/**
 * Arxmin.php.
 *
 * @project : esa
 * @author  : danielsum
 */

namespace Arx\Arxmin\models;

use Arx;
use Arx\classes\Container;
use Arx\classes\File;
use Symfony\Component\Finder\Finder;
use Config;

class Arxmin extends Container
{

    protected $menu = array();

    public static function getMenu()
    {
        $instance = self::getInstance();

        $finder = new Finder();

        $menu = self::getDbMenu();

        foreach($finder->name('manifest.json')->in(Config::get('paths.workbench')) as $file){

            $json = json_decode(file_get_contents($file->getRealpath()), true);

            $menu[$file->getRelativePath()] = $json;

        }

        return $instance->menu = $menu;

    }

    public static function getDbMenu(){
        return array(
            'facebook' => array(
                'name' => 'Dashboard',
                'type' => 'iframe',
                'href' => '/arxmin/dashboard'
            )
        );
    }
}