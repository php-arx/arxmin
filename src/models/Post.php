<?php namespace Arxmin;

use Arx\EloquentModel;

class Post extends EloquentModel {

    protected $table = "posts";

    use modelUtilsTrait, getFilesHandlingTrait, getCatsTrait, getTagsTrait;

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

    /**
     * Deletes a blog post and all the associated comments.
     *
     * @return bool
     */
    public function delete()
    {
        // Delete the comments
        $this->comments()->delete();

        // Delete the blog post
        return parent::delete();
    }

    /**
     * Returns a formatted post content entry, this ensures that
     * line breaks are returned.
     *
     * @return string
     */
    public function content()
    {
        return nl2br($this->content);
    }

    /**
     * Return the post's author.
     *
     * @return User
     */
    public function author()
    {
        return $this->belongsTo('User', 'user_id');
    }

    /**
     * Return how many comments this post has.
     *
     * @return array
     */
    public function comments()
    {
        return $this->hasMany('Comment');
    }

    /**
     * Return the URL to the post.
     *
     * @return string
     */
    public function url()
    {
        return URL::route('view-post', $this->slug);
    }

    /**
     * Return the post thumbnail image url.
     *
     * @return string
     */
    public function thumbnail()
    {
        # you should save the image url on the database
        # and return that url here.

        return 'http://lorempixel.com/130/90/business/';
    }

    /**
     * Return metafields of the current post
     */
    public function getMetaFields()
    {
        return $this->form()->meta;
    }

    /**
     * Scope form
     */
    public function form()
    {
        return Form::whereRaw('manage REGEXP ?', ['\"'.$this->type.'\"'])->first();
    }
}
