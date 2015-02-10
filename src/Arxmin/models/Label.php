<?php namespace Arxmin;

use Arx\EloquentModel;
use Illuminate\Support\Collection;

use Input, Session, Config, App, Lang;

class Label extends EloquentModel {

    public static $aUndefinedLabels = array();

	public static $_structure = array(

	);

	public $hidden = array();

    public $locale = null;

    public static $locales = null;

    public function __construct(){

        global $lg;

        $lg = array();

        $this->locale = App::getLocale();
    }

    /***
     * Get Locale file
     *
     * @return mixed
     */
    public static function getLocales()
    {
        self::$locales = Config::get('app.locales', [Config::get('app.locale')]);

        return self::$locales;
    }

    public function getLangs() {

		$structure = Config::get( 'app.locales' );

		return $structure;
	}

	/**
	 * Transform Meta Attribute
	 *
	 * @param $value
	 *
	 * @return string|void
	 */
	public function getMetaAttributes( $value ) {

        if (is_array($value)) {
            return $value;
        }

        $return = json_decode($value, true);

        if (!is_array($return))
            return array();
        else
            return $return;
	}

    /**
    * Get All Labels
    */
    public static function getAll($param = [])
    {


        return self::all();
    }

    /**
     * Handle missing Label
     *
     * @param $uniqueId
     * @param $key
     * @param $group
     */
    public function missingLabel($uniqueId, $key, $group){

        if(Input::has('writeMode')){
            Session::put('writeMode', true);
        }

        if(Input::has('readMode')){
            Session::forget('writeMode');
        }

        if(Session::has('writeMode')){
            try {

                $label = new self;

                $label->uniqueid = $uniqueId;

                $label->ref = $key;

                $label->meta = $group;

                foreach (self::$locales as $lang) {
                    $label->$lang = $key;
                }

                $label->save();

            } catch (\Exception $e) {

            }

        }
    }

    /**
     * Get Label from table
     *
     * @param $key
     * @param string $group
     * @param array $mParam
     * @return string
     */
    public static function get($key, $mParam = array(), $group = 'common')
    {
        self::getInstance();

        global $lg;

        $labelMode = Input::get('labelMode');

        if ($labelMode == 'info') {
            return $group.$key;
        }

        if (is_array($group)) {
            $mParam = $group;
            $group = 'common';
        }

        $uniqueId = $group.'.'.$key;

        if(isset($lg[$uniqueId])){
            return $lg[$group.'.'.$key];
        }

        $value = Lang::get($uniqueId, $mParam);

        /**
         * if we can't find the label
         */
        if ($value == $uniqueId) {

            self::getInstance()->missingLabel($uniqueId, $key, $group);

            return $key;
        }

        return $value;

    } // get


    /**
     * Make the place-holder replacements on a line.
     *
     * @param  string  $line
     * @param  array   $replace
     * @return string
     */
    public static function _makeReplacements($line, array $replace)
    {
        $replace = self::_sortReplacements($replace);

        foreach ($replace as $key => $value)
        {
            $line = str_replace(':'.$key, $value, $line);
        }

        return $line;
    }

    /**
     * Sort the replacements array.
     *
     * @param  array  $replace
     * @return array
     */
    public static function _sortReplacements(array $replace)
    {
        return with(new Collection($replace))->sortBy(function($r)
        {
            return mb_strlen($r) * -1;
        });
    }

}