<?php namespace Arxmin;

/**
 * This file is portage of Entrust,
 * a great role & permission management solution for Laravel.
 *
 * @author Zizaco Zizuini <zizaco@gmail.com>
 * @license MIT
 * @package Zizaco\Entrust
 */
use Illuminate\Support\Facades\Config;

trait PermissionTrait
{
    /**
     * Many-to-Many relations with role model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Config::get('arxmin.role'), Config::get('arxmin.permission_role_table'));
    }
    /**
     * Boot the permission model
     * Attach event listener to remove the many-to-many records when trying to delete
     * Will NOT delete any records if the permission model uses soft deletes.
     *
     * @return void|bool
     */
    public static function boot()
    {
        parent::boot();
        static::deleting(function($permission) {
            if (!method_exists(Config::get('arxmin.permission'), 'bootSoftDeletingTrait')) {
                $permission->roles()->sync([]);
            }
            return true;
        });
    }
}