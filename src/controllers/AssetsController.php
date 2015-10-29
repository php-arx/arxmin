<?php namespace Arxmin;

use Arx\classes\Composer;

class AssetsController extends \Arx\AssetsController
{
    public $_paths = array('modules');


    /**
     * Check file from registered path
     *
     * @param null $file
     * @return string
     */
    public function path($file = null)
    {
        $base_path = base_path();

        $pieces = explode('/', $file);

        foreach($this->_paths as $path){

            $name = $pieces[0];

            # Looking for existing module

            $module = \Module::get($name);

            if($module){
                # Add public to the path

                unset($pieces[0]);

                array_splice($pieces, 0, 0, 'Assets');

                $currentPath = $module->getPath().'/'.implode('/', $pieces);

                if (is_file($currentPath)) {

                    return $currentPath;
                }
            }
        }

        return false;
    }
}