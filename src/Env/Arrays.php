<?php

declare(strict_types=1);

namespace Elephant\Env;

use function array_change_key_case;
use function array_chunk;
use function array_column;
use function array_combine;
use function array_count_values;
use function array_fill;
use function array_fill_keys;
use function array_filter;
use function array_flip;
use function array_values;
use function array_walk;
use function array_walk_recursive;
use function call_user_func_array;

class Arrays
{
    /**
     * Returns an array with all keys from array lowercased or uppercased. Numbered indices are left as is.
     *
     * @link https://www.php.net/manual/en/function.array-change-key-case.php
     * @param array $array
     * @param int $case
     * @return array
     */
    public static function arrayChangeKeyCase(array $array, int $case = CASE_LOWER): array
    {
        return array_change_key_case($array, $case);
    }

    /**
     * Chunks an array into arrays with length elements. The last chunk may contain less than length elements.
     *
     * @link https://www.php.net/manual/en/function.array-chunk.php
     * @param array $array
     * @param int $length
     * @param bool $preserve_keys
     * @return array
     */
    public static function arrayChunk(array $array, int $length, bool $preserve_keys = false): array
    {
        return array_chunk($array, $length, $preserve_keys);
    }

    public static function arrayColumn(array $array, int|string|null $column_key, int|string|null $index_key = null): array
    {
        return array_column($array, $column_key, $index_key);
    }

    public static function arrayCombine(array $keys, array $values): array
    {
        return array_combine($keys, $values);
    }

    public static function arrayCountValues(array $array): array
    {
        return array_count_values($array);
    }

    public static function arrayDiffAssoc(array $array, array ...$arrays): array
    {
        return call_user_func_array('array_diff_assoc', func_get_args());
    }

    public static function arrayDiffKey(array $array, array ...$arrays): array
    {
        return call_user_func_array('array_diff_key', func_get_args());
    }

    public static function arrayDiffUassoc(): array
    {
        return call_user_func_array('array_diff_uassoc', func_get_args());
    }

    public static function arrayDiffUkey(): array
    {
        return call_user_func_array('array_diff_ukey', func_get_args());
    }

    /**
     * Compares array against one or more other arrays and returns the values in array that are not present in any of the other arrays.
     *
     * @link https://www.php.net/manual/en/function.array-diff.php
     * @param array $array
     * @param mixed ...$arrays
     * @return array
     */
    public static function arrayDiff(array $array, array ...$arrays): array
    {
        return call_user_func_array('array_diff', func_get_args());
    }

    /**
     * Fills an array with the value of the value parameter, using the values of the keys array as keys.
     *
     * @link https://www.php.net/manual/en/function.array-fill-keys.php
     * @param array $keys
     * @param mixed $value
     * @return array
     */
    public static function arrayFillKeys(array $keys, mixed $value): array
    {
        return array_fill_keys($keys, $value);
    }

    /**
     * Fills an array with count entries of the value of the value parameter, keys starting at the start_index parameter.
     *
     * @link https://www.php.net/manual/en/function.array-fill.php
     * @param int $start_index
     * @param int $count
     * @param mixed $value
     * @return array
     */
    public static function arrayFill(int $start_index, int $count, mixed $value): array
    {
        return array_fill($start_index, $count, $value);
    }

    /**
     * Iterates over each value in the array passing them to the callback function. If the callback function returns
     * true, the current value from array is returned into the result array.
     *
     * Array keys are preserved, and may result in gaps if the array was indexed. The result array can be reindexed
     * using the array_values() function.
     *
     * @param array $array
     * @param callable|null $callback
     * @param int $mode
     * @return array
     */
    public static function arrayFilter(array $array, ?callable $callback = null, int $mode = 0): array
    {
        return array_filter($array, $callback, $mode);
    }

    /**
     * array_flip() returns an array in flip order, i.e. keys from array become values and values from array become keys.
     *
     * Note that the values of array need to be valid keys, i.e. they need to be either int or string. A warning will be
     * emitted if a value has the wrong type, and the key/value pair in question will not be included in the result.
     *
     * If a value has several occurrences, the latest key will be used as its value, and all others will be lost.
     *
     * @param array $array
     * @return array
     */
    public static function arrayFlip(array $array): array
    {
        return array_flip($array);
    }

    /**
     * array_values() returns all the values from the array and indexes the array numerically.
     *
     * @param array $array
     * @return array
     */
    public static function arrayValues(array $array): array
    {
        return array_values($array);
    }

    /**
     * Applies the user-defined callback function to each element of the array. This function will recurse into deeper
     * arrays.
     *
     * @param array|object $array
     * @param callable $callback
     * @param mixed|null $arg
     * @return bool
     */
    public static function arrayWalkRecursive(array|object &$array, callable $callback, mixed $arg = null): bool
    {
        return array_walk_recursive($array, $callback, $arg);
    }

    /**
     * Applies the user-defined callback function to each element of the array array.
     *
     * array_walk() is not affected by the internal array pointer of array. array_walk() will walk through the entire
     * array regardless of pointer position.
     *
     * @link https://www.php.net/manual/en/function.array-walk.php
     * @param array|object $array
     * @param callable $callback
     * @param mixed|null $arg
     * @return bool
     */
    public static function arrayWalk(array|object &$array, callable $callback, mixed $arg = null): bool
    {
        return array_walk($array, $callback, $arg);
    }
}