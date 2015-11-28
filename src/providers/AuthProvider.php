<?php namespace Arxmin;


use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Session;

class AuthProvider implements UserProvider {

    use modelUserTrait;

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        return $this->arxminUser();
    }

    /**
     * Retrieve a user by by their unique identifier and "remember me" token.
     *
     * @param  mixed $identifier
     * @param  string $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {

        dd($identifier, $token);

        return $this->arxminUser();
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  string $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        dd($user, $token);
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        #1. try to get the super user admin
        $email = Arxmin::getOption('arxmin.super_email');
        $password = Arxmin::getOption('arxmin.super_password');

        if ( $credentials['email'] == $email && $password == bcrypt( $credentials['password'] ) ) {

            Session::put('super_admin',true);

            return $this->arxminUser();
        }

        return null;
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  array $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        dd($user, $credentials);
        return true;
    }


    /**
     * Generate ArxminUser
     *
     * @return GenericUser
     */
    protected function arxminUser(){

        $attributes = array(
            'id' => 0,
            'username' => Arxmin::getOption('arxmin.super_first_name'),
            'first_name' => Arxmin::getOption('arxmin.super_first_name'),
            'last_name' => Arxmin::getOption('arxmin.super_last_name'),
            'password' => Arxmin::getOption('arxmin.super_password'),
            'name' => Arxmin::getOption('arxmin.super_first_name'),
            'email' => Arxmin::getOption('arxmin.super_email'),
            'type' => 'superadmin',
            'role' => 'superadmin',
            'remember_token' => ''
        );

        return new SuperUser($attributes);
    }
}