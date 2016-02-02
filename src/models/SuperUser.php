<?php namespace Arxmin;

use Illuminate\Auth\GenericUser;

/**
 * Class SuperUser
 *
 * Mock a Super Admin User from the option table
 *
 * @package Arxmin
 */
class SuperUser extends GenericUser
{
    use modelUserTrait;
}