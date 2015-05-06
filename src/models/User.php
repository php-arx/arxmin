<?php namespace Arxmin;

use Arx\classes\Utils;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword, UserTrait, getFilesHandlingTrait, modelUtilsTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Check if data is json_type
     *
     * @var array
     */
    protected static $jsonable = array();

    /**
     * Defined fillable data
     *
     * @var array
     */
    protected $fillable = array('*');
    
    public static $app = null;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = array(
        'email' => 'required|email|unique:users',
        'password' => 'required|min:4|confirmed',
        'password_confirmation' => 'min:4',
    );

    /**
     * Create a new self instance.
     * @param array $attributes
     */
    public function __construct( array $attributes = array() )
    {
        parent::__construct( $attributes );

        if ( ! static::$app )
            static::$app = app();

        # Get the Auth table
        $this->table = static::$app['config']->get('auth.table');
    }


    /**
     * add a boot handlers
     */
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

    public static function forceJsonable($model){

        foreach($model::$jsonable as $key){
            if(is_array($model->{$key})){
                $model->{$key} = json_encode($model->{$key});
            }
        }

        return $model;
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

}