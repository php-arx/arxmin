<?php namespace Arxmin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Permission extends Model implements PermissionInterface
{
    use PermissionTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;
    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->table = Config::get('entrust.permissions_table');
    }
}