<?php  
{
    class Validator{

        public static function  inputValid($value, $min = 1, $max = INF)
        {
            $value = trim($value);

            return strlen($value) >= $min && strlen($value) <= $max;
        }

        public static function emailValid($value)
        {
           return filter_var($value, FILTER_VALIDATE_EMAIL);
        }
    }
}