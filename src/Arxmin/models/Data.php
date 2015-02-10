<?php namespace Arxmin;

use Arx\classes\Str;
use Arx\EloquentModel;
use Arr, Hook;

class Data extends EloquentModel {

    protected $table = "datas";

	protected $fillable = [
        'slug',
        'title',
        'meta',
        'meta_type',
        'ref',
        'lang',
        'type',
        'version',
        'level',
        'position',
        'categories',
        'tags',
        'status',
        'context',
        'logs',
    ];

    public static $structure = [
        'id' => ['type' => 'integer'],
        'slug' => ['type' => 'integer'],
        'title' => ['type' => 'integer'],
        'body' => ['type' => 'integer'],
        'meta' => ['type' => 'integer'],
        'meta_type' => ['type' => 'integer'],
        'ref' => ['type' => 'integer'],
        'lang' => ['type' => 'integer'],
        'type' => ['type' => 'integer'],
        'version' => ['type' => 'integer'],
        'level' => ['type' => 'integer'],
        'position' => ['type' => 'integer'],
        'categories' => ['type' => 'integer'],
        'tags' => ['type' => 'integer'],
        'status' => ['type' => 'integer'],
        'context' => ['type' => 'integer'],
        'logs' => ['type' => 'integer'],
        'created_at' => ['type' => 'integer'],
        'updated_at' => ['type' => 'integer']
    ];

    public static function boot()
    {
        parent::boot();

        // Setup event bindings...
        self::saving(function($model)
        {

        });
    }


    public function getMetaAttribute($value){
		return json_decode($value, true) ?: [];
	}

	/**
	 * Return types used in table Data
	 *
	 * @param array $param
	 * @return array
	 * @throws \Exception
	 */
	public static function getUsedTypes(array $param = [])
	{
		$param = Arr::merge([
			'format' => 'array'
		], $param);

		$response = self::select('type')->groupBy('type')->get()->toArray();

		$response = array_map(function ($item) {
			return $item['type'];
		}, $response);

		return Api::response($response, 200, 'Ok');
	}


    /**
     * Check if Slug is correct
     *
     * @return static
     */
    public function checkSlug()
    {
        if(empty($this->slug)){
            $slug = Str::slug($this->title);
            if($this->whereRaw('slug = ? and type = ? and id != ?', [$slug, $this->type, $this->id])->first(['id'])){
                $slug = $slug.'-'.$this->id;
            }

            $this->slug = $slug;

            $this->save();
        }

        return $this;
    }

	/**
	 * Return Type Hooked in Arxmin
	 *
	 * @return bool
	 */
	public static function getTypes()
	{
		$response = \Hook::get('arxmin::data.types') ?: array('form', 'page', 'article');

		return Api::response($response, 200);
	}

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public static function create(array $attributes)
    {
        $model = new static($attributes);

        $model->save();

        $model->checkSlug();

        return $model;
    }

    public static function scopeOfType($query, $type){
        return $query->where('type', $type);
    }

    /**
     * Search param
     *
     * @param array $param
     */
    public static function search($param = [])
    {
        $query = static::select();

        if(isset($param['type']) && !empty($param['type'])){
            $query->where('type', $param['type']);
        }


        return $query->get();
    }



}