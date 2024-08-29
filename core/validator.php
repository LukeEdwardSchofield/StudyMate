<?php  
namespace Core;

{
    class Validator{

        public static function  inputValid($value, $min = 1, $max = INF)
        {
            //Ensure $value is a string before calling trim
            $value = is_string($value) ? trim($value) : "";

            return strlen($value) >= $min && strlen($value) <= $max;
        }

        public static function emailValid($value)
        {
           return filter_var($value, FILTER_VALIDATE_EMAIL);
        }
    }
}