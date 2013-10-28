<?php namespace Arxmin;

use Arx\classes\Model;

class UserModel extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    protected $fillable = array('email', 'password');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    public function crypt($value){
        return Hash::make($value);
    }

    /**
     *
     * @todo login function
     * @param $email
     * @param $password
     *
     * @return bool|void
     */
    public static function login($email, $password){
        return true;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public static function loginPassword($password)
    {
        return User::where('password', '=', $password)->find(1);
    }
}