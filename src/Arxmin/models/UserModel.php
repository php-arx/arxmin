<?php namespace Arxmin;

use \Zizaco\Confide\ConfideUser;
use Arx\classes\Utils;

class UserModel extends ConfideUser {

    protected static $jsonable = array();

    public static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
            foreach(self::$jsonable as $key){
                if(is_array($model->{$key})){
                    $model->{$key} = json_encode($model->{$key});
                }
            }
        });

        static::updating(function($model)
        {
            foreach(self::$jsonable as $key){
                if(is_array($model->{$key})){
                    $model->{$key} = json_encode($model->{$key});
                }
            }
        });
    }

    /**
     * Transform to Array even Data encoded
     *
     * @return array
     */
    public function toArrayAll()
    {
        $data = $this->toArray();

        foreach(self::$jsonable as $key){

            if(isset($data[$key]) && Utils::isJson($data[$key])){
                $data[$key] = json_decode($this->{$key});
            }
        }

        return $data;
    }

    /**
     * Returns the user full name, it simply concatenates
     * the user first and last name.
     *
     * @return string
     */
    public function full_name()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Returns the user Gravatar image url.
     *
     * @return string
     */
    public function gravatar()
    {
        // Generate the Gravatar hash
        $gravatar = md5(strtolower(trim($this->email)));

        // Return the Gravatar url
        return "//gravatar.org/avatar/{$gravatar}";
    }

}