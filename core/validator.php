<?php  
namespace Core;
class Validator
{
    public static function validateInput($input, $min = 1, $max = INF)
    {
        //To trim all the whitespaces
        $value = trim($input);

        //will return either a true or a false
        return strlen($value) > $min && strlen($value) <= $max;
    }

    public static function  validateEmail($email)
    {
        //returns either a true or false
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}