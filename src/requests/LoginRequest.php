<?php namespace Arxmin\requests;

class LoginRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function validate(){
        return true;
    }
}