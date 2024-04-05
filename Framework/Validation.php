<?php
namespace Framework;

class Validation
{


    /**
     * Validate string
     *
     * @param string $value
     * @param  int $min
     * @param  mixed $max
     * @return bool
     */
    public static function string(string $value, int $min = 1, $max = INF): bool
    {
        if (is_string($value)) {
            $value = trim($value);
            $length = strlen($value);


            return $length >= $min && $length <= $max;
        }

        return false;
    }

    /**
     * Validate email
     *
     * @param  mixed $value
     * @return void
     */
    public static function email(string $value)
    {
        $value = trim($value);
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }


    /**
     * match two values
     *
     * @param  mixed $value1
     * @param  mixed $value2
     * @return bool
     */
    public static function match(mixed $value1, mixed $value2): bool
    {
        return trim($value1) == trim($value2);
    }
}