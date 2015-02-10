<?php namespace Arxmin;

use Hash, Crypt;
use Arx\EloquentModel;

class Option extends EloquentModel {

    protected $table = "options";

	public static function set($name, $value, $context = null, $type = null){

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

	/**
	 * Get Value
	 *
	 * @param $name
	 * @param null $default
	 */
	public static function get($name, $default = null, $decode = true){

		$item = self::where('name', $name)->first();

		if (!$item) {
			return false;
		}

		dc( $item );

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