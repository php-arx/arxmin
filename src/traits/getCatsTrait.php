<?php namespace Arxmin;

trait getCatsTrait {
    /**
     * Get Meta
     *
     * @param $value
     * @return array|mixed
     */
    public function getCatsAttribute($value)
    {

        if (is_array($value)) {
            return $value;
        }

        $return = json_decode($value, true);

        if (!is_array($return))
            return array();
        else
            return $return;
    }

    public function scopeByCats($query){

    }

    public function searchByCats($mCats){
        if (is_int($mCats)) {
            $mCats = [$mCats];
        }
    }
}