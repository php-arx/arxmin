<?php namespace Arxmin;

use Illuminate\Auth\GenericUser;

class SuperUser extends GenericUser
{
    use modelUserTrait;

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
}