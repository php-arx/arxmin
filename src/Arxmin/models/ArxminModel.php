<?php
/**
 * Arxmin.php.
 *
 * @project : esa
 * @author  : danielsum
 */

namespace Arxmin;

use Arx;
use Arx\classes\Container;
use Arx\classes\File;
use Symfony\Component\Finder\Finder;
use Config,URL;

class ArxminModel extends Container
{

    protected $menu = array();

    public static function getMenu()
    {
        $instance = self::getInstance();

        $finder = new Finder();

        $menu = self::getDbMenu();

        $results = $finder->name('manifest.json')->in(Config::get('arxmin::paths.workbench'));

        foreach($results as $file){

            $json = json_decode(file_get_contents($file->getRealpath()), true);

            $menu[$file->getRelativePath()] = $json;

        }

        return $instance->menu = $menu;

    }

    public static function getDbMenu(){
        return array(
            'dashboard' => array(
                'name' => 'Dashboard',
                'type' => 'iframe',
                'href' => '/arxmin/dashboard',
                'children' => array(
                    array(
                        'name' => 'Home',
                        'type' => 'iframe',
                        'href' => '/arxmin/dashboard/home'
                    ),

                    array(
                        'name' => 'User Manager',
                        'type' => 'iframe',
                        'href' => '/arxmin/dashboard/user'
                    ),

                    array(
                        'name' => 'Lang Manager',
                        'type' => 'iframe',
                        'href' => '/arxmin/dashboard/lang'
                    ),

                    array(
                        'name' => 'Tables Manager',
                        'type' => 'iframe',
                        'href' => '/arxmin/dashboard/table'
                    ),

                    array(
                        'name' => 'Configuration Manager',
                        'type' => 'iframe',
                        'href' => '/arxmin/dashboard/configuration'
                    )
                )
            )
        );
    }

    /**
     * @todo
     */
    public static function getWidgets()
    {

    }
}