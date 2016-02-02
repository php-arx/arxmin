<?php namespace Arxmin;

/**
 * Class modelUserTrait
 *
 * Method needed for your User model
 *
 * @package Arxmin
 */
trait modelUserTrait {

    /**
     * Return
     */
    public function full_name()
    {
        return $this->name;
    }

    /**
     * Get Meta
     *
     * @param $value
     * @return array|mixed
     */
    public function getNameAttribute($value)
    {
        if(!empty($this->name)){
            return $this->name;
        } elseif(!empty($this->first_name) && !empty($this->last_name)){
            return $this->first_name.' '.$this->last_name;
        } elseif(!empty($this->first_name) && empty($this->last_name)){
            return $this->first_name;
        } elseif(empty($this->first_name) && !empty($this->last_name)){
            return $this->last_name;
        } else{
            return $this->email;
        }
    }

    /**
     * Inflexive trait
     *
     * @param $value
     * @return array|mixed
     */
    public function getFullNameAttribute($value)
    {
        return $this->name;
    }

    /**
     * Inflexive trait
     *
     * @param $value
     * @return array|mixed
     */
    public function getFirstNameAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    /**
     * Returns the user Gravatar image url.
     *
     * @return string
     */
    public function getGravatar()
    {
        // Generate the Gravatar hash
        $gravatar = md5(strtolower(trim($this->email)));

        // Return the Gravatar url
        return "//gravatar.org/avatar/{$gravatar}";
    }

    /**
     * Inflexive trait
     *
     * @param $value
     * @return array|mixed
     */
    public function getLastNameAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

}