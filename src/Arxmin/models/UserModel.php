<?php namespace Arxmin;

use \Zizaco\Confide\ConfideUser;
use Arx\classes\Utils;

/**
 * Class UserModel
 *
 * Default UserModel
 *
 * @package Arxmin
 */
class UserModel extends ConfideUser implements UserInterface {

    protected static $jsonable = array();

    protected $fillable = array('*');

    public static $rules = array(
        'username' => 'unique:users,username',
        'email' => 'email'
    );

    public static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
            foreach (self::$jsonable as $key){
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
        if(empty($this->first_name) && empty($this->last_name)){
            return null;
        }

        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get Auth user
     *
     * @return \Illuminate\Auth\UserInterface|null
     */
    public static function getAuth(){
        return \Auth::getUser();
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

    public static function forceJsonable($model){

        foreach($model::$jsonable as $key){
            if(is_array($model->{$key})){
                $model->{$key} = json_encode($model->{$key});
            }
        }

        return $model;
    }

    /**
     * Decode JsonModel
     *
     * @return $this
     */
    public function decodeJson(){

        foreach(self::$jsonable as $key){

            if(isset($this->{$key}) && Utils::isJson($$this->{$key})){
                $this->{$key} = json_decode($this->{$key});
            }
        }

        return $this;
    }

}