<?php namespace Arxmin;

use Arx\classes\Str;
use ZipArchive;
use Module as ParentClass;

/**
 * Class Module
 *
 * @package Arxmin
 */
class Module extends ParentClass
{
    
    public static $currentModule = null;

    /**
     * Download the module from an url
     *
     * @param $url
     * @param $dest
     * @return bool
     */
    public static function download($url, $name, $dest = null){

        if ($dest == null) {
            $dest = \Module::getPath();
        }

        $tmpName = date($name.'-Ymdhis.zip');

        $result = file_put_contents(__DIR__."/".$tmpName, fopen($url, 'r'));

        if ($result) {
            $zip = new ZipArchive;
            if ($zip->open(__DIR__."/".$tmpName) === true) {

                $destFolder = $dest . '/' . $name;
                $oldFolder = "";

                if (is_dir($destFolder)) {

                    $oldFolder = $destFolder . '-old';

                    if (is_dir($oldFolder)) {
                        \File::deleteDirectory($oldFolder);
                    }

                    rename($destFolder, $oldFolder);
                }

                $tmpFolder = $dest . '/' . $name . '-tmp';

                $zip->extractTo($tmpFolder);
                $zip->close();

                $file = glob($tmpFolder.'/*');

                $result = rename($file[0], $destFolder);

                \File::deleteDirectory($tmpFolder);

                if ($result) {
                    \File::deleteDirectory($oldFolder);
                }

                return $result;
            } else {
                return false;
            }
        }

        return false;
    }

    public static function moduleAsset($path)
    {
        return self::asset(self::getUsed().':').Str::mustBeginWith('/', $path);
    }

    public static function modulePath($path){
        return self::getModulePath(self::getUsed()).$path;
    }

    public static function moduleUrl($path = null)
    {
        return arxminUrl('modules/'.strtolower(self::getUsed()).Str::mustBeginWith('/', $path));
    }


    /**
     * Apply current module
     *
     * @param $name
     */
    public static function setUsed($name){
        self::$currentModule = $name;
        parent::setUsed($name);
    }

    /**
     * Set the current used module
     *
     * @param $name
     */
    public static function setCurrent($name){
        self::setUsed($name);
    }
}