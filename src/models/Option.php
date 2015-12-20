<?php namespace Arxmin;

use Hash, Crypt;
use Arx\EloquentModel;

class Option extends EloquentModel {

    protected $table = "arxmin_options";

    /**
     * Set option
     *
     * @param $name
     * @param $value
     * @param null $context
     * @param null $type
     * @return bool
     */
	public static function setEntry($name, $value, $context = null, $type = null){

		$item = self::where('name', $name)->first();

		if (!$item) {
			$item = new self;
		}

		$item->name = $name;

		if (!$type) {
			if (is_string($value)) {
				$type = 'string';
			} else{
				$type = 'serializable';
			}
		}

        if ($type == 'serializable') {
			$value = serialize($value);
		} elseif ($type == 'json') {
			$value = json_encode($value);
		} elseif ($type == 'hashed') {
			$value = Hash::make($value);
		} elseif ($type == 'crypted') {
			$value = Crypt::encrypt($value);
		}

		$item->value = $value;

		$item->type = $type;

		$item->context = $context;

		return $item->save();
	}

	public static function hasEntry($name){
		return self::where('name', $name)->first();
	}

    /**
     * Get Value
     *
     * @param $name
     * @param null $default
     * @return \Illuminate\Database\Eloquent\Collection|mixed|string|static[]
     */
	public static function getEntry($name, $default = null, $decode = true){

		$item = self::hasEntry($name);

		if (!$item) {
			return false;
		}

		switch ($item->type) {
			case 'json':
				$value = json_decode($item->value);
				break;
			case 'serializable':
				$value = unserialize($item->value);
				break;
			case 'crypted':
				$value = Crypt::decrypt($item->value);
				break;
			default:
				$value = $item->value;
				break;
		}

		return $value;
	}

}