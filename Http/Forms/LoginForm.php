<?php


namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm{

    protected $errors = [];


    //note expected type in param 
    public function __construct(public array $attributes)
    {
      
        if(!Validator::email($attributes['email'])){
            $this->errors['email'] = 'Please provide a valid email address';
        }

        if(!Validator::string($attributes['password'], 7, 255)){
            $this->errors['password'] = 'Please provide a valid password';
        }

          
    }


    
    /**
     * validate
     *We create 
     * @param  mixed $attributes
     * @return void
     */
    public static function validate($attributes){

        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function failed(){
        return count($this->errors());
    }

    public function throw(){
        ValidationException::throw($this->errors, $this->attributes);
    }

    public function errors(){
        return $this->errors;
    }
    
    public function error($field, $message){
        
        $this->errors[$field] = $message;

        return $this;
    }
}