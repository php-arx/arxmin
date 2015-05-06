<?php namespace Arxmin;

use Arx\EloquentModel;

class Form extends EloquentModel {

    protected $table = "forms";

    use getMetaAttributeTrait;

}
