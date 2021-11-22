<?php

declare(strict_types=1);

namespace Elephant\Env;

use function strtolower;
use function substr;
use function trim;

class Strings
{
    /**
     * Returns string with all alphabetic characters converted to lowercase.
     *
     * @link https://www.php.net/manual/en/function.strtolower.php
     * @param string $string
     * @return string
     */
    public static function strtolower(string $string):string{
        return strtolower($string);
    }
    /**
     * Returns the portion of string specified by the offset and length parameters.
     *
     * @link https://www.php.net/manual/en/function.substr.php
     * @param string $string
     * @param int $offset
     * @param int|null $length
     * @return string
     */
    public static function substr(string $string, int $offset, ?int $length = null): string
    {
        return substr($string, $offset, $length);
    }

    /**
     * This function returns a string with whitespace stripped from the beginning and end of string.
     * Without the second parameter, trim() will strip these characters:
     *
     * @param string $string
     * @param string $characters
     * @return string
     */
    public static function trim(string $string, string $characters = " \n\r\t\v\0"): string
    {
        return trim($string, $characters);
    }
}