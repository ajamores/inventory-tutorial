<?php

namespace Core;



/**
 * Recall how we had to do this everytime we needed to send requests to db
 * $config = require base_path('config.php');
 * $db = new Database($config['database']);
 * 
 * The container make it so that you only have to call once
 */
class Container{
    
    protected $bindings = [];
    /**
     * bind aka add to the container....youll see bind and resolove as the name in frameworks
     *
     * @return void
     */
    public function bind($key, $instruction ){
        $this->bindings[$key] = $instruction;
    }
    
  
    /**
     * resolve
     *
     * resolve aka remove
     * Take the object out of the container
     * @param  mixed $key
     * @return the specific bindings instruction or function 
     */
    public function resolve($key){
        
    //Check if the key is there in first place
        if(!array_key_exists($key, $this->bindings)){
            throw new \Exception("No matching binding for {$key}");
        }

        //get the function script
        $instruction = $this->bindings[$key];

        //Call the function which is the instruction 
        return call_user_func($instruction);
    }
}