<?php namespace Arxmin;

/**
 * Class Api
 *
 * Api Current Version
 *
 */
class Api extends \Arx\classes\Singleton
{
    use modelApiTrait;

    /**
     * Api Current Version
     *
     * @var string
     */
    public static $version = "1.0.0";
}