<?php namespace Arxmin;

use Illuminate\Auth\GenericUser;

/**
 * Class SuperUser
 *
 * Mock a super user
 *
 * @package Arxmin
 */
class SuperUser extends GenericUser
{
    use modelUserTrait;
}