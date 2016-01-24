<?php namespace Arxmin;

use Arx\classes\Arr;
use Arx\classes\Image;
use Exception, File;
use Input;

/**
 * Class getFilesHandlingTrait
 *
 * @deprecated pleas use modelFilesHandlingTrait
 * @package Arxmin
 */
trait getFilesHandlingTrait {

    protected $_currentPath_checked = null;
    protected $currentPath = null;

    //protected static $filepath = null;

    /**
     * Check if folders exists
     */
    public function getCurrentPath()
    {
        if(!$this->filepath){
            $this->filepath = 'files/'.$this->table;
        }

        $this->currentPath = public_path(static::$filepath.'/' . $this->id);

        if (!$this->_currentPath_checked) {
            if(!is_dir($this->currentPath)){
                @mkdir($this->currentPath, 0777, true);
            } else {
                $this->_currentPath_checked = true;
            }
        }

        return $this->currentPath;
    }

    /**
     * Filepath
     *
     * @param $path
     * @return string
     */
    public function path($path = null)
    {
        return $this->getCurrentPath() . '/' . $path;
    }

    /**
     * Get Relative path start from /public/
     *
     * @param null $path
     * @return mixed
     */
    public function relPath($path = null)
    {
        # Cleaning path
        $path = preg_replace('/^\//', '', $path);

        return str_replace(public_path(), '', $this->getCurrentPath().'/'.$path);
    }

    /**
     * Upload method helper
     *
     * @param null $name
     * @param null $file
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function upload($name = null, $file = null, $params = ['afterUpload' => null, 'beforeUpload' => null, 'coords' => null, 'width' => null, 'height' => null, 'beforeUploadImage' => null]){

        Arr::mergeWithDefaultParams($params);

        $data = [];

        if($file){
            $data['file'] = $file;
        } elseif(Input::hasFile('file')){
            $data['file'] = Input::file('file');
        }   else {
            trigger_error("File doesn't exist.");
        }

        $data['name'] = $name;

        $data['params'] = $params;

        $data['response'] = false;

        $data['path'] = $this->relPath();

        $data['fullname'] = $data['file']->getClientOriginalName();

        $data['extension'] = $data['file']->getExtension();
        $data['mimeType'] = $data['file']->getMimeType();

        if(in_array($data['mimeType'], ['image/gif', 'image/jpeg', 'image/png'])){
            $data['type'] = "image";
        } else {
            $data['type'] = "file";
        }

        if(!$data['name']){
            $data['name'] = $data['file']->getClientOriginalName();
        } elseif(!preg_match('/\.'.$data['extension'].'$/i', $data['name'])){
            $data['convert'] = true;
        } elseif(!preg_match('/\./i', $data['name'])){
            $data['name'] .= $data['name'] . '.' . $data['extension'];
        }

        if($params['beforeUpload']){
            $data = $params['beforeUpload']($data);
        }

        if($data['type'] == 'image'){

            $img = Image::load($data['file']->getRealPath());

            if($data['params']['coords']){
                $coords = $data['params']['coords'];
                if (!is_array($coords)) {
                    $coords = json_decode(stripslashes($coords), true);
                }
                $img->crop($coords['x'], $coords['y'], $coords['x'] + $coords['w'], $coords['y'] + $coords['h']);
            } elseif($data['params']['width'] && $data['params']['height']) {
                $img->resize($data['params']['width'], $data['params']['height']);
            } elseif($data['params']['width']){
                $img->fit_to_width($data['params']['width']);
            } elseif($data['params']['height']) {
                $img->fit_to_width($data['params']['height']);
            }

            if($params['beforeUploadImage']){
                $img = $params['beforeUploadImage']($img);
            }

            @mkdir($data['path'], null, true);

            $data['response'] = $img->save(public_path($data['path'] . $data['name']));

        } else {
            $data['response'] = File::move($data['file']->getRealPath(), $data['path'] . $data['name']);
        }

        if($params['afterUpload']){
            $data = $params['afterUpload']($data);
        }

        return $data;
    }

}