<?php namespace Arxmin;

use Illuminate\Auth\GenericUser;

class SuperUser extends GenericUser
{
    use modelUserTrait;
}