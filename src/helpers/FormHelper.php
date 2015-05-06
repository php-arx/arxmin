<?php namespace Arxmin\helpers;

use Arx\classes\Facade;
use Arx\classes\Helper;
use Arx\classes\Arr;
use Former\Facades\Former;
use Form;

/**
 * Class FormHelper
 *
 * @package Arxmin
 */
class FormHelper extends Facade {

    /**
     * Group a label with a form
     *
     * @param $label
     * @param $form
     */
    public static function group($label, $form = false){
       $html = "\n\n<div class=\"form-group\"> \n";
       $html .= "<label>".$label."</label>\n";
       $html .= $form."\n";
       $html .= "</div>"."\n\n";
       return $html;
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'form'; }

    /**
     * Open up a new HTML form.
     *
     * @param array $options
     * @return string
     * @static
     */
    public static function open($options = array()){ return self::resolve(); }

    /**
     * Create a new model based form builder.
     *
     * @param mixed $model
     * @param array $options
     * @return string
     * @static
     */
    public static function model($model, $options = array()){ return self::resolve(); }

    /**
     * Set the model instance on the form builder.
     *
     * @param mixed $model
     * @return void
     * @static
     */
    public static function setModel($model){ return self::resolve(); }

    /**
     * Close the current form.
     *
     * @return string
     * @static
     */
    public static function close(){ return self::resolve(); }

    /**
     * Generate a hidden field with the current CSRF token.
     *
     * @return string
     * @static
     */
    public static function token(){ return self::resolve(); }

    /**
     * Create a form label element.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     * @static
     */
    public static function label($name, $value = null, $options = array()){ return self::resolve(); }

    /**
     * Create a form input field.
     *
     * @param string $type
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     * @static
     */
    public static function input($type, $name, $value = null, $options = array()){ return self::resolve(); }

    /**
     * Create a text input field.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     * @static
     */
    public static function text($name, $value = null, $options = array()){

        $defOptions = array(
            'class' => 'form-control'
        );

        $options = Arr::merge($defOptions, $options);

        return self::resolve($name, $value, $options);
    }

    /**
     * Create a password input field.
     *
     * @param string $name
     * @param array $options
     * @return string
     * @static
     */
    public static function password($name, $options = array()){ return self::resolve(); }

    /**
     * Create a hidden input field.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     * @static
     */
    public static function hidden($name, $value = null, $options = array()){ return self::resolve(); }

    /**
     * Create an e-mail input field.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     * @static
     */
    public static function email($name, $value = null, $options = array()){ return self::resolve(); }

    /**
     * Create a url input field.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     * @static
     */
    public static function url($name, $value = null, $options = array()){ return self::resolve(); }

    /**
     * Create a file input field.
     *
     * @param string $name
     * @param array $options
     * @return string
     * @static
     */
    public static function file($name, $options = array()){ return self::resolve(); }

    /**
     * Create a textarea input field.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return string
     * @static
     */
    public static function textarea($name, $value = null, $options = array()){ return self::resolve(); }

    /**
     * Create a number input field.
     *
     * @param string $name
     * @param array $options
     * @return string
     * @static
     */
    public static function number($name, $value = null, $options = array()){ return self::resolve(); }

    /**
     * Create a select box field.
     *
     * @param string $name
     * @param array $list
     * @param string $selected
     * @param array $options
     * @return string
     * @static
     */
    public static function select($name, $list = array(), $selected = null, $options = array()){ return self::resolve(); }

    /**
     * Create a select range field.
     *
     * @param string $name
     * @param string $begin
     * @param string $end
     * @param string $selected
     * @param array $options
     * @return string
     * @static
     */
    public static function selectRange($name, $begin, $end, $selected = null, $options = array()){ return self::resolve(); }

    /**
     * Create a select year field.
     *
     * @param string $name
     * @param string $begin
     * @param string $end
     * @param string $selected
     * @param array $options
     * @return string
     * @static
     */
    public static function selectYear(){ return self::resolve(); }

    /**
     * Create a select month field.
     *
     * @param string $name
     * @param string $selected
     * @param array $options
     * @param string $format
     * @return string
     * @static
     */
    public static function selectMonth($name, $selected = null, $options = array(), $format = '%B'){ return self::resolve(); }

    /**
     * Get the select option for the given value.
     *
     * @param string $display
     * @param string $value
     * @param string $selected
     * @return string
     * @static
     */
    public static function getSelectOption($display, $value, $selected){ return self::resolve(); }

    /**
     * Create a checkbox input field.
     *
     * @param string $name
     * @param mixed $value
     * @param bool $checked
     * @param array $options
     * @return string
     * @static
     */
    public static function checkbox($name, $value = 1, $checked = null, $options = array()){ return self::resolve(); }

    /**
     * Create a radio button input field.
     *
     * @param string $name
     * @param mixed $value
     * @param bool $checked
     * @param array $options
     * @return string
     * @static
     */
    public static function radio($name, $value = null, $checked = null, $options = array()){ return self::resolve(); }

    /**
     * Create a HTML reset input element.
     *
     * @param string $value
     * @param array $attributes
     * @return string
     * @static
     */
    public static function reset($value, $attributes = array()){ return self::resolve(); }

    /**
     * Create a HTML image input element.
     *
     * @param string $url
     * @param string $name
     * @param array $attributes
     * @return string
     * @static
     */
    public static function image($url, $name = null, $attributes = array()){ return self::resolve(); }

    /**
     * Create a submit button element.
     *
     * @param string $value
     * @param array $options
     * @return string
     * @static
     */
    public static function submit($value = null, $options = array()){ return self::resolve(); }

    /**
     * Create a button element.
     *
     * @param string $value
     * @param array $options
     * @return string
     * @static
     */
    public static function button($value = null, $options = array()){ return self::resolve(); }

    /**
     * Get the ID attribute for a field name.
     *
     * @param string $name
     * @param array $attributes
     * @return string
     * @static
     */
    public static function getIdAttribute($name, $attributes){ return self::resolve(); }

    /**
     * Get the value that should be assigned to the field.
     *
     * @param string $name
     * @param string $value
     * @return string
     * @static
     */
    public static function getValueAttribute($name, $value = null){ return self::resolve(); }

    /**
     * Get a value from the session's old input.
     *
     * @param string $name
     * @return string
     * @static
     */
    public static function old($name){ return self::resolve(); }

    /**
     * Determine if the old input is empty.
     *
     * @return bool
     * @static
     */
    public static function oldInputIsEmpty(){ return self::resolve(); }

    /**
     * Get the session store implementation.
     *
     * @return \Illuminate\Session\Store $session
     * @static
     */
    public static function getSessionStore(){ return self::resolve(); }

    /**
     * Set the session store implementation.
     *
     * @param \Illuminate\Session\Store $session
     * @return $this
     * @static
     */
    public static function setSessionStore($session){ return self::resolve(); }

    /**
     * Register a custom macro.
     *
     * @param string $name
     * @param callable $macro
     * @return void
     * @static
     */
    public static function macro($name, $macro){ return self::resolve(); }

    /**
     * Checks if macro is registered
     *
     * @param string $name
     * @return boolean
     * @static
     */
    public static function hasMacro($name){ return self::resolve(); }

}