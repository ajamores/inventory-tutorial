<?php

namespace Core;

class Validator{


    
    
    /**
     * string
     *
     * Validates 2 things now 
     * 1. That the value is above a sepcific limit so not blank
     * 2. That it is within the specificed limit
     * 
     * This function is an example of a pure function:
     * - Output depends only on inputs
     * - No side effects
     * - Does not modify external state
    *
    * Pure functions improve predictability, testability,
    * and code reliability. ALSO cause its pure you can make it static 
     * 
     * @param  mixed $value - $_POST['body]
     * @param  mixed $min - can make it eg. 1 atleast 1 char must be saved
     * @param  mixed $max - can go up INF(Infinity) obviously make within reasonlable limits
     * @return void
     */
    public static function string($value, $min, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    
    /**
     * email
     *
     * Mannnnnnnnn wayyy easier to find if valid email
     * filter_var also has alot of other options you can 
     * look for not just email. And you dont need to use some crazy regex
     * 
     * @param  mixed $value
     * @return void
     */
    public static function email(string $value): bool{


        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    
    /**
     * greaterThan
     *
     * Determine if value is greater than specified number
     * @param  mixed $value - to check 
     * @param  mixed $number - benchmark 
     * @return bool
     */
    public static function greaterThan(int $value, int $number): bool{
        return $value > $number;
    }

  

}