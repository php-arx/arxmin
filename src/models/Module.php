<?php namespace Arxmin;

use ZipArchive;

use Module as ParentClass;

class Module extends ParentClass
{

    /**
     * Download a Git
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
}