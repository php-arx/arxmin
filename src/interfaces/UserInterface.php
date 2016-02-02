<?php namespace Arxmin;

interface UserInterface {
    /**
     * Returns the user full name, it simply concatenates
     * the user first and last name.
     *
     * @return string
     */
    public function full_name();

    /**
     * Get Auth user
     *
     * @return \Illuminate\Auth\UserInterface|null
     */
    public static function getAuth();


    /**
     * Returns the user Gravatar image url.
     *
     * @return string
     */
    public function gravatar();


}