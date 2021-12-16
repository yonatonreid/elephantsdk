<?php

declare(strict_types=1);

namespace Elephant\Env;

use ArrayAccess;
use ArrayObject;
use Countable;
use JetBrains\PhpStorm\Pure;
use function array_change_key_case;
use function array_chunk;
use function array_column;
use function array_combine;
use function array_count_values;
use function array_fill;
use function array_fill_keys;
use function array_filter;
use function array_flip;
use function array_key_exists;
use function array_key_first;
use function array_key_last;
use function array_keys;
use function array_pad;
use function array_pop;
use function array_product;
use function array_rand;
use function array_reduce;
use function array_reverse;
use function array_search;
use function array_shift;
use function array_slice;
use function array_splice;
use function array_sum;
use function array_unique;
use function array_values;
use function array_walk;
use function array_walk_recursive;
use function arsort;
use function asort;
use function call_user_func_array;
use function count;
use function current;
use function end;
use function in_array;
use function key;
use function key_exists;
use function krsort;
use function ksort;
use function natcasesort;
use function natsort;
use function next;
use function pos;
use function prev;
use function range;
use function reset;
use function rsort;
use function shuffle;
use function sort;
use function uasort;
use function uksort;
use function usort;

/**
 * Class Arrays
 *
 * @package \Elephant\Env
 */
final class Arrays
{
    /**
     * Changes the case of all keys in an array
     *
     * @link https://php.net/manual/en/function.array-change-key-case.php
     * @param array $array <p>
     * The array to work on
     * </p>
     * @param int $case [optional] <p>
     * Either CASE_UPPER or
     * CASE_LOWER (default)
     * </p>
     * @return array an array with its keys lower or uppercased
     * @meta
     */
    #[Pure]
    public static function arrayChangeKeyCase(array $array, int $case = CASE_LOWER): array
    {
        return array_change_key_case($array, $case);
    }

    /**
     * Split an array into chunks
     *
     * @link https://php.net/manual/en/function.array-chunk.php
     * @param array $array <p>
     * The array to work on
     * </p>
     * @param int $length <p>
     * The size of each chunk
     * </p>
     * @param bool $preserve_keys [optional] <p>
     * When set to true keys will be preserved.
     * Default is false which will reindex the chunk numerically
     * </p>
     * @return array a multidimensional numerically indexed array, starting with zero,
     * with each dimension containing size elements.
     */
    #[Pure]
    public static function arrayChunk(array $array, int $length, bool $preserve_keys = false): array
    {
        return array_chunk($array, $length, $preserve_keys);
    }

    /**
     * (PHP 5 &gt;=5.5.0)<br/>
     * Return the values from a single column in the input array
     *
     * @link https://secure.php.net/manual/en/function.array-column.php
     * @param array $array <p>A multi-dimensional array (record set) from which to pull a column of values.</p>
     * @param string|int|null $column_key <p>The column of values to return. This value may be the integer key of the column you wish to retrieve, or it may be the string key name for an associative array. It may also be NULL to return complete arrays (useful together with index_key to reindex the array).</p>
     * @param string|int|null $index_key [optional] <p>The column to use as the index/keys for the returned array. This value may be the integer key of the column, or it may be the string key name.</p>
     * @return array Returns an array of values representing a single column from the input array.
     * @since 5.5
     */
    #[Pure]
    public static function arrayColumn(array $array, int|string|null $column_key, int|string|null $index_key = null): array
    {
        return array_column($array, $column_key, $index_key);
    }

    /**
     * Creates an array by using one array for keys and another for its values
     *
     * @link https://php.net/manual/en/function.array-combine.php
     * @param array $keys <p>
     * Array of keys to be used. Illegal values for key will be
     * converted to string.
     * </p>
     * @param array $values <p>
     * Array of values to be used
     * </p>
     * @return array|false the combined array, false if the number of elements
     * for each array isn't equal or if the arrays are empty.
     * @meta
     */
    #[Pure]
    public static function arrayCombine(array $keys, array $values): array|false
    {
        return array_combine($keys, $values);
    }

    /**
     * Counts all the values of an array
     * @link https://php.net/manual/en/function.array-count-values.php
     * @param array $array <p>
     * The array of values to count
     * </p>
     * @return array an associative array of values from input as
     * keys and their count as value.
     */
    #[Pure]
    public static function arrayCountValues(array $array): array
    {
        return array_count_values($array);
    }

    /**
     * Computes the difference of arrays with additional index check
     * @link https://php.net/manual/en/function.array-diff-assoc.php
     * @param array $array1 <p>
     * The array to compare from
     * </p>
     * @param array $array2 <p>
     * An array to compare against
     * </p>
     * @param array ...$_ [optional]
     * @return array an array containing all the values from
     * array1 that are not present in any of the other arrays.
     * @meta
     */
    #[Pure]
    public static function arrayDiffAssoc(array $array1, array $array2, array ...$_): array
    {
        return call_user_func_array('array_diff_assoc', func_get_args());
    }

    /**
     * Computes the difference of arrays using keys for comparison
     * @link https://php.net/manual/en/function.array-diff-key.php
     * @param array $array1 <p>
     * The array to compare from
     * </p>
     * @param array $array2 <p>
     * An array to compare against
     * </p>
     * @param array ...$_ [optional]
     * @return array an array containing all the entries from
     * array1 whose keys are not present in any of the
     * other arrays.
     * @meta
     */
    #[Pure]
    public static function arrayDiffKey(array $array1, array $array2, array ...$_): array
    {
        return call_user_func_array('array_diff_key', func_get_args());
    }

    /**
     * Computes the difference of arrays with additional index check which is performed by a user supplied callback function
     * @link https://php.net/manual/en/function.array-diff-uassoc.php
     * @param array $array1 <p>
     * The array to compare from
     * </p>
     * @param array $array2 <p>
     * An array to compare against
     * </p>
     * @param array ...$_ [optional]
     * @param callable $key_compare_func <p>
     * callback function to use.
     * The callback function must return an integer less than, equal
     * to, or greater than zero if the first argument is considered to
     * be respectively less than, equal to, or greater than the second.
     * </p>
     * @return array an array containing all the entries from
     * array1 that are not present in any of the other arrays.
     * @meta
     */
    public static function arrayDiffUassoc(): array
    {
        return call_user_func_array('array_diff_uassoc', func_get_args());
    }

    /**
     * Computes the difference of arrays using a callback function on the keys for comparison
     * @link https://php.net/manual/en/function.array-diff-ukey.php
     * @param array $array1 <p>
     * The array to compare from
     * </p>
     * @param array $array2 <p>
     * An array to compare against
     * </p>
     * @param array ...$_ [optional]
     * @param callable $key_compare_func <p>
     * callback function to use.
     * The callback function must return an integer less than, equal
     * to, or greater than zero if the first argument is considered to
     * be respectively less than, equal to, or greater than the second.
     * </p>
     * @return array an array containing all the entries from
     * array1 that are not present in any of the other arrays.
     * @meta
     */
    public static function arrayDiffUkey(): array
    {
        return call_user_func_array('array_diff_ukey', func_get_args());
    }

    /**
     * Computes the difference of arrays
     * @link https://php.net/manual/en/function.array-diff.php
     * @param array $array <p>
     * The array to compare from
     * </p>
     * @param array ...$excludes <p>
     * An array to compare against
     * </p>
     * @return array an array containing all the entries from
     * array1 that are not present in any of the other arrays.
     * @meta
     */
    #[Pure]
    public static function arrayDiff(array $array, array ...$excludes): array
    {
        return call_user_func_array('array_diff', func_get_args());
    }

    /**
     * Fill an array with values, specifying keys
     * @link https://php.net/manual/en/function.array-fill-keys.php
     * @param array $keys <p>
     * Array of values that will be used as keys. Illegal values
     * for key will be converted to string.
     * </p>
     * @param mixed $value <p>
     * Value to use for filling
     * </p>
     * @return array the filled array
     */
    #[Pure]
    public static function arrayFillKeys(array $keys, mixed $value): array
    {
        return array_fill_keys($keys, $value);
    }

    /**
     * Fill an array with values
     * @link https://php.net/manual/en/function.array-fill.php
     * @param int $start_index <p>
     * The first index of the returned array.
     * Supports non-negative indexes only.
     * </p>
     * @param int $count <p>
     * Number of elements to insert
     * </p>
     * @param mixed $value <p>
     * Value to use for filling
     * </p>
     * @return array the filled array
     */
    #[Pure]
    public static function arrayFill(int $start_index, int $count, mixed $value): array
    {
        return array_fill($start_index, $count, $value);
    }

    /**
     * Iterates over each value in the <b>array</b>
     * passing them to the <b>callback</b> function.
     * If the <b>callback</b> function returns true, the
     * current value from <b>array</b> is returned into
     * the result array. Array keys are preserved.
     * @link https://php.net/manual/en/function.array-filter.php
     * @param array $array <p>
     * The array to iterate over
     * </p>
     * @param callable|null $callback [optional] <p>
     * The callback function to use
     * </p>
     * <p>
     * If no callback is supplied, all entries of
     * input equal to false (see
     * converting to
     * boolean) will be removed.
     * </p>
     * @param int $mode [optional] <p>
     * Flag determining what arguments are sent to <i>callback</i>:
     * </p><ul>
     * <li>
     * <b>ARRAY_FILTER_USE_KEY</b> - pass key as the only argument
     * to <i>callback</i> instead of the value</span>
     * </li>
     * <li>
     * <b>ARRAY_FILTER_USE_BOTH</b> - pass both value and key as
     * arguments to <i>callback</i> instead of the value</span>
     * </li>
     * </ul>
     * @return array the filtered array.
     * @meta
     */
    public static function arrayFilter(array $array, ?callable $callback = null, int $mode = 0): array
    {
        return array_filter($array, $callback, $mode);
    }

    /**
     * Exchanges all keys with their associated values in an array
     * @link https://php.net/manual/en/function.array-flip.php
     * @param int[]|string[] $array <p>
     * An array of key/value pairs to be flipped.
     * </p>
     * @return int[]|string[] Returns the flipped array.
     */
    #[Pure]
    public static function arrayFlip(array $array): array
    {
        return array_flip($array);
    }

    /**
     * Computes the intersection of arrays with additional index check
     * @link https://php.net/manual/en/function.array-intersect-assoc.php
     * @param array $array1 <p>
     * The array with main values to check.
     * </p>
     * @param array $array2 <p>
     * An array to compare values against.
     * </p>
     * @param array ...$_ [optional]
     * @return array an associative array containing all the values in
     * array1 that are present in all of the arguments.
     * @meta
     */
    #[Pure]
    public static function arrayIntersectAssoc(array $array1, array $array2, array ...$_): array
    {
        return call_user_func_array('array_intersect_assoc', func_get_args());
    }

    /**
     * Computes the intersection of arrays using keys for comparison
     * @link https://php.net/manual/en/function.array-intersect-key.php
     * @param array $array1 <p>
     * The array with main keys to check.
     * </p>
     * @param array $array2 <p>
     * An array to compare keys against.
     * </p>
     * @param array ...$_ [optional]
     * @return array an associative array containing all the entries of
     * array1 which have keys that are present in all
     * arguments.
     * @meta
     */
    #[Pure]
    public static function arrayIntersectKey(array $array1, array $array2, array ...$_): array
    {
        return call_user_func_array('array_intersect_key', func_get_args());
    }

    /**
     * Computes the intersection of arrays with additional index check, compares indexes by a callback function
     * @link https://php.net/manual/en/function.array-intersect-uassoc.php
     * @param array $array1 <p>
     * Initial array for comparison of the arrays.
     * </p>
     * @param array $array2 <p>
     * First array to compare keys against.
     * </p>
     * @param array ...$_ [optional]
     * @param callable $key_compare_func <p>
     * User supplied callback function to do the comparison.
     * </p>
     * @return array the values of array1 whose values exist
     * in all of the arguments.
     * @meta
     */
    public static function arrayIntersectUassoc(): array
    {
        return call_user_func_array('array_intersect_uassoc', func_get_args());
    }

    /**
     * Computes the intersection of arrays using a callback function on the keys for comparison
     * @link https://php.net/manual/en/function.array-intersect-ukey.php
     * @param array $array1 <p>
     * Initial array for comparison of the arrays.
     * </p>
     * @param array $array2 <p>
     * First array to compare keys against.
     * </p>
     * @param array ...$_ [optional]
     * @param callable $key_compare_func <p>
     * User supplied callback function to do the comparison.
     * </p>
     * @return array the values of array1 whose keys exist
     * in all the arguments.
     * @meta
     */
    public static function arrayIntersectUkey(): array
    {
        return call_user_func_array('array_intersect_ukey', func_get_args());
    }

    /**
     * Computes the intersection of arrays
     * @link https://php.net/manual/en/function.array-intersect.php
     * @param array $array <p>
     * The array with main values to check.
     * </p>
     * @param array ...$arrays <p>
     * An array to compare values against.
     * </p>
     * @return array an array containing all of the values in
     * array1 whose values exist in all of the parameters.
     * @meta
     */
    #[Pure]
    public static function arrayIntersect(array $array, array ...$arrays): array
    {
        return call_user_func_array('array_intersect', func_get_args());
    }

    /**
     * Checks if the given key or index exists in the array
     * @link https://php.net/manual/en/function.array-key-exists.php
     * @param int|string $key <p>
     * Value to check.
     * </p>
     * @param array|ArrayObject $array <p>
     * An array with keys to check.
     * </p>
     * @return bool true on success or false on failure.
     */
    #[Pure]
    public static function arrayKeyExists(string|int $key, array|ArrayObject $array): bool
    {
        return array_key_exists($key, $array);
    }

    /**
     * Gets the first key of an array
     *
     * Get the first key of the given array without affecting the internal array pointer.
     *
     * @link https://secure.php.net/array_key_first
     * @param array $array An array
     * @return string|int|null Returns the first key of array if the array is not empty; NULL otherwise.
     * @since 7.3
     */
    #[Pure]
    public static function arrayKeyFirst(array $array): int|string|null
    {
        return array_key_first($array);
    }

    /**
     * Gets the last key of an array
     *
     * Get the last key of the given array without affecting the internal array pointer.
     *
     * @link https://secure.php.net/array_key_last
     * @param array $array An array
     * @return string|int|null Returns the last key of array if the array is not empty; NULL otherwise.
     * @since 7.3
     */
    #[Pure]
    public static function arrayKeyLast(array $array): int|string|null
    {
        return array_key_last($array);
    }

    /**
     * Return all the keys or a subset of the keys of an array
     * @link https://php.net/manual/en/function.array-keys.php
     * @param array $array <p>
     * An array containing keys to return.
     * </p>
     * @param mixed $filter_value [optional] <p>
     * If specified, then only keys containing these values are returned.
     * </p>
     * @param bool $strict [optional] <p>
     * Determines if strict comparison (===) should be used during the search.
     * </p>
     * @return int[]|string[] an array of all the keys in input.
     */
    #[Pure]
    public static function arrayKeys(array $array, mixed $filter_value = null, bool $strict = false): array
    {
        return array_keys($array, $filter_value, $strict);
    }

    /**
     * Applies the callback to the elements of the given arrays
     * @link https://php.net/manual/en/function.array-map.php
     * @param callable|null $callback <p>
     * Callback function to run for each element in each array.
     * </p>
     * @param array $array <p>
     * An array to run through the callback function.
     * </p>
     * @param array ...$arrays [optional]
     * @return array an array containing all the elements of arr1
     * after applying the callback function to each one.
     * @meta
     */
    public static function arrayMap(?callable $callback, array $array, array ...$arrays): array
    {
        return call_user_func_array('array_map', func_get_args());
    }

    /**
     * Merge two or more arrays recursively
     * @link https://php.net/manual/en/function.array-merge-recursive.php
     * @param array ...$arrays [optional] Variable list of arrays to recursively merge.
     * @return array An array of values resulted from merging the arguments together.
     */
    #[Pure]
    public static function arrayMergeRecursive(array ...$arrays): array
    {
        return call_user_func_array('array_merge_recursive', func_get_args());
    }

    /**
     * Merges the elements of one or more arrays together (if the input arrays have the same string keys, then the later value for that key will overwrite the previous one; if the arrays contain numeric keys, the later value will be appended)
     * Since 7.4.0 this function can be called without any parameter, and it will return empty array.
     * @link https://php.net/manual/en/function.array-merge.php
     * @param array ...$arrays <p>
     * Variable list of arrays to merge.
     * </p>
     * @return array the resulting array.
     * @meta
     */
    #[Pure]
    public static function arrayMerge(array ...$arrays): array
    {
        return call_user_func_array('array_merge', func_get_args());
    }

    /**
     * Sort multiple or multi-dimensional arrays
     * @link https://php.net/manual/en/function.array-multisort.php
     * @param array &$array <p>
     * An array being sorted.
     * </p>
     * @param  &...$rest [optional] <p>
     * More arrays, optionally followed by sort order and flags.
     * Only elements corresponding to equivalent elements in previous arrays are compared.
     * In other words, the sort is lexicographical.
     * </p>
     * @return bool true on success or false on failure.
     */
    public static function arrayMultisort(array &$array, mixed $array1_sort_order = SORT_ASC, mixed $array1_sort_flags = SORT_REGULAR,
                                          mixed ...$rest
    ): bool
    {
        return call_user_func_array('array_multisort', func_get_args());
    }

    /**
     * Pad array to the specified length with a value
     * @link https://php.net/manual/en/function.array-pad.php
     * @param array $array <p>
     * Initial array of values to pad.
     * </p>
     * @param int $length <p>
     * New size of the array.
     * </p>
     * @param mixed $value <p>
     * Value to pad if input is less than
     * pad_size.
     * </p>
     * @return array a copy of the input padded to size specified
     * by pad_size with value
     * pad_value. If pad_size is
     * positive then the array is padded on the right, if it's negative then
     * on the left. If the absolute value of pad_size is less than or equal to
     * the length of the input then no padding takes place.
     */
    #[Pure]
    public static function arrayPad(array $array, int $length, mixed $value): array
    {
        return array_pad($array, $length, $value);
    }

    /**
     * Pop the element off the end of array
     * @link https://php.net/manual/en/function.array-pop.php
     * @param array &$array <p>
     * The array to get the value from.
     * </p>
     * @return mixed|null the last value of array.
     * If array is empty (or is not an array),
     * null will be returned.
     * @meta
     */
    public static function arrayPop(array &$array): mixed
    {
        return array_pop($array);
    }

    /**
     * Calculate the product of values in an array
     * @link https://php.net/manual/en/function.array-product.php
     * @param array $array <p>
     * The array.
     * </p>
     * @return int|float the product as an integer or float.
     */
    #[Pure]
    public static function array_product(array $array): int|float
    {
        return array_product($array);
    }

    /**
     * Push elements onto the end of array
     * Since 7.3.0 this function can be called with only one parameter.
     * For earlier versions at least two parameters are required.
     * @link https://php.net/manual/en/function.array-push.php
     * @param array &$array <p>
     * The input array.
     * </p>
     * @param mixed ...$values [optional] <p>
     * The pushed variables.
     * </p>
     * @return int the number of elements in the array.
     */
    public static function arrayPush(array &$array, mixed ...$values): int
    {
        return call_user_func_array('array_push', func_get_args());
    }

    /**
     * Pick one or more random keys out of an array
     * @link https://php.net/manual/en/function.array-rand.php
     * @param array $array <p>
     * The input array.
     * </p>
     * @param int $num [optional] <p>
     * Specifies how many entries you want to pick.
     * </p>
     * @return int|string|array If you are picking only one entry, array_rand
     * returns the key for a random entry. Otherwise, it returns an array
     * of keys for the random entries. This is done so that you can pick
     * random keys as well as values out of the array.
     */
    #[Pure]
    public static function arrayRand(array $array, int $num = 1): int|string|array
    {
        return array_rand($array, $num);
    }

    /**
     * Iteratively reduce the array to a single value using a callback function
     * @link https://php.net/manual/en/function.array-reduce.php
     * @param array $array <p>
     * The input array.
     * </p>
     * @param callable $callback <p>
     * The callback function. Signature is <pre>callback ( mixed $carry , mixed $item ) : mixed</pre>
     * <blockquote>mixed <var>$carry</var> <p>The return value of the previous iteration; on the first iteration it holds the value of <var>$initial</var>.</p></blockquote>
     * <blockquote>mixed <var>$item</var> <p>Holds the current iteration value of the <var>$input</var></p></blockquote>
     * </p>
     * @param mixed $initial [optional] <p>
     * If the optional initial is available, it will
     * be used at the beginning of the process, or as a final result in case
     * the array is empty.
     * </p>
     * @return mixed the resulting value.
     * <p>
     * If the array is empty and initial is not passed,
     * array_reduce returns null.
     * </p>
     * <br/>
     * <p>
     * Example use:
     * <blockquote><pre>array_reduce(['2', '3', '4'], function($ax, $dx) { return $ax . ", {$dx}"; }, '1')  // Returns '1, 2, 3, 4'</pre></blockquote>
     * <blockquote><pre>array_reduce(['2', '3', '4'], function($ax, $dx) { return $ax + (int)$dx; }, 1)  // Returns 10</pre></blockquote>
     * <br/>
     * </p>
     * @meta
     */
    public static function arrayReduce(array $array, callable $callback, mixed $initial = null): mixed
    {
        return array_reduce($array, $callback, $initial);
    }

    /**
     * Replaces elements from passed arrays into the first array recursively
     * @link https://php.net/manual/en/function.array-replace-recursive.php
     * @param array $array <p>
     * The array in which elements are replaced.
     * </p>
     * @param array ...$replacements <p>
     * The array from which elements will be extracted.
     * </p>
     * @return array an array, or null if an error occurs.
     */
    #[Pure]
    public static function arrayReplaceRecursive(array $array, array ...$replacements): array
    {
        return call_user_func_array('array_replace_recursive', func_get_args());
    }

    /**
     * array_replace() replaces the values of the first array with the same values from all the following arrays.
     * If a key from the first array exists in the second array, its value will be replaced by the value from the second array.
     * If the key exists in the second array, and not the first, it will be created in the first array.
     * If a key only exists in the first array, it will be left as is. If several arrays are passed for replacement,
     * they will be processed in order, the later arrays overwriting the previous values.
     * array_replace() is not recursive : it will replace values in the first array by whatever type is in the second array.
     * @link https://php.net/manual/en/function.array-replace.php
     * @param array $array <p>
     * The array in which elements are replaced.
     * </p>
     * @param array ...$replacements <p>
     * The array from which elements will be extracted.
     * </p>
     * @return array or null if an error occurs.
     */
    #[Pure]
    public static function arrayReplace(array $array, array ...$replacements): array
    {
        return call_user_func_array('array_replace', func_get_args());
    }

    /**
     * Return an array with elements in reverse order
     * @link https://php.net/manual/en/function.array-reverse.php
     * @param array $array <p>
     * The input array.
     * </p>
     * @param bool $preserve_keys [optional] <p>
     * If set to true keys are preserved.
     * </p>
     * @return array the reversed array.
     * @meta
     */
    #[Pure]
    public static function arrayReverse(array $array, bool $preserve_keys = false): array
    {
        return array_reverse($array, $preserve_keys);
    }

    /**
     * Searches the array for a given value and returns the first corresponding key if successful
     * @link https://php.net/manual/en/function.array-search.php
     * @param mixed $needle <p>
     * The searched value.
     * </p>
     * <p>
     * If needle is a string, the comparison is done
     * in a case-sensitive manner.
     * </p>
     * @param array $haystack <p>
     * The array.
     * </p>
     * @param bool $strict [optional] <p>
     * If the third parameter strict is set to true
     * then the array_search function will also check the
     * types of the
     * needle in the haystack.
     * </p>
     * @return int|string|false the key for needle if it is found in the
     * array, false otherwise.
     * </p>
     * <p>
     * If needle is found in haystack
     * more than once, the first matching key is returned. To return the keys for
     * all matching values, use array_keys with the optional
     * search_value parameter instead.
     */
    #[Pure]
    public static function arraySearch(mixed $needle, array $haystack, bool $strict = false): int|string|false
    {
        return array_search($needle, $haystack, $strict);
    }

    /**
     * Shift an element off the beginning of array
     * @link https://php.net/manual/en/function.array-shift.php
     * @param array &$array <p>
     * The input array.
     * </p>
     * @return mixed|null the shifted value, or null if array is
     * empty or is not an array.
     * @meta
     */
    public static function arrayShift(array &$array): mixed
    {
        return array_shift($array);
    }

    /**
     * Extract a slice of the array
     * @link https://php.net/manual/en/function.array-slice.php
     * @param array $array <p>
     * The input array.
     * </p>
     * @param int $offset <p>
     * If offset is non-negative, the sequence will
     * start at that offset in the array. If
     * offset is negative, the sequence will
     * start that far from the end of the array.
     * </p>
     * @param int|null $length [optional] <p>
     * If length is given and is positive, then
     * the sequence will have that many elements in it. If
     * length is given and is negative then the
     * sequence will stop that many elements from the end of the
     * array. If it is omitted, then the sequence will have everything
     * from offset up until the end of the
     * array.
     * </p>
     * @param bool $preserve_keys [optional] <p>
     * Note that array_slice will reorder and reset the
     * array indices by default. You can change this behaviour by setting
     * preserve_keys to true.
     * </p>
     * @return array the slice.
     * @meta
     */
    #[Pure]
    public static function arraySlice(array $array, int $offset, ?int $length = null, bool $preserve_keys = false): array
    {
        return array_slice($array, $offset, $length, $preserve_keys);
    }

    /**
     * Remove a portion of the array and replace it with something else
     * @link https://php.net/manual/en/function.array-splice.php
     * @param array &$array <p>
     * The input array.
     * </p>
     * @param int $offset <p>
     * If offset is positive then the start of removed
     * portion is at that offset from the beginning of the
     * input array. If offset
     * is negative then it starts that far from the end of the
     * input array.
     * </p>
     * @param int|null $length [optional] <p>
     * If length is omitted, removes everything
     * from offset to the end of the array. If
     * length is specified and is positive, then
     * that many elements will be removed. If
     * length is specified and is negative then
     * the end of the removed portion will be that many elements from
     * the end of the array. Tip: to remove everything from
     * offset to the end of the array when
     * replacement is also specified, use
     * count($input) for
     * length.
     * </p>
     * @param mixed $replacement [optional] <p>
     * If replacement array is specified, then the
     * removed elements are replaced with elements from this array.
     * </p>
     * <p>
     * If offset and length
     * are such that nothing is removed, then the elements from the
     * replacement array are inserted in the place
     * specified by the offset. Note that keys in
     * replacement array are not preserved.
     * </p>
     * <p>
     * If replacement is just one element it is
     * not necessary to put array()
     * around it, unless the element is an array itself.
     * </p>
     * @return array the array consisting of the extracted elements.
     */
    public static function arraySplice(array &$array, int $offset, ?int $length = null, mixed $replacement = []): array
    {
        return array_splice($array, $offset, $length, $replacement);
    }

    /**
     * Calculate the sum of values in an array
     * @link https://php.net/manual/en/function.array-sum.php
     * @param array $array <p>
     * The input array.
     * </p>
     * @return int|float the sum of values as an integer or float.
     */
    #[Pure]
    public static function arraySum(array $array): int|float
    {
        return array_sum($array);
    }

    /**
     * Computes the difference of arrays with additional index check, compares data by a callback function
     * @link https://php.net/manual/en/function.array-udiff-assoc.php
     * @param array $array1 <p>
     * The first array.
     * </p>
     * @param array $array2 <p>
     * The second array.
     * </p>
     * @param array ...$_ [optional]
     * @param callable $data_compare_func <p>
     * The callback comparison function.
     * </p>
     * <p>
     * The user supplied callback function is used for comparison.
     * It must return an integer less than, equal to, or greater than zero if
     * the first argument is considered to be respectively less than, equal
     * to, or greater than the second.
     * </p>
     * @return array array_udiff_assoc returns an array
     * containing all the values from array1
     * that are not present in any of the other arguments.
     * Note that the keys are used in the comparison unlike
     * array_diff and array_udiff.
     * The comparison of arrays' data is performed by using an user-supplied
     * callback. In this aspect the behaviour is opposite to the behaviour of
     * array_diff_assoc which uses internal function for
     * comparison.
     * @meta
     */
    public static function arrayUdiffAssoc(): array
    {
        return call_user_func_array('array_udiff_assoc', func_get_args());
    }

    /**
     * Computes the difference of arrays with additional index check, compares data and indexes by a callback function
     * @link https://php.net/manual/en/function.array-udiff-uassoc.php
     * @param array $array1 <p>
     * The first array.
     * </p>
     * @param array $array2 <p>
     * The second array.
     * </p>
     * @param array ...$_ [optional]
     * @param callable $data_compare_func <p>
     * The callback comparison function.
     * </p>
     * <p>
     * The user supplied callback function is used for comparison.
     * It must return an integer less than, equal to, or greater than zero if
     * the first argument is considered to be respectively less than, equal
     * to, or greater than the second.
     * </p>
     * <p>
     * The comparison of arrays' data is performed by using an user-supplied
     * callback : data_compare_func. In this aspect
     * the behaviour is opposite to the behaviour of
     * array_diff_assoc which uses internal function for
     * comparison.
     * </p>
     * @param callable $key_compare_func <p>
     * The comparison of keys (indices) is done also by the callback function
     * key_compare_func. This behaviour is unlike what
     * array_udiff_assoc does, since the latter compares
     * the indices by using an internal function.
     * </p>
     * @return array an array containing all the values from
     * array1 that are not present in any of the other
     * arguments.
     * @meta
     */
    public static function arrayUdiffUassoc(): array
    {
        return call_user_func_array('array_udiff_uassoc', func_get_args());
    }

    /**
     * Computes the difference of arrays by using a callback function for data comparison
     * @link https://php.net/manual/en/function.array-udiff.php
     * @param array $array1 <p>
     * The first array.
     * </p>
     * @param array $array2 <p>
     * The second array.
     * </p>
     * @param array ...$_ [optional]
     * @param callable $data_compare_func <p>
     * The callback comparison function.
     * </p>
     * <p>
     * The user supplied callback function is used for comparison.
     * It must return an integer less than, equal to, or greater than zero if
     * the first argument is considered to be respectively less than, equal
     * to, or greater than the second.
     * </p>
     * @return array an array containing all the values of array1
     * that are not present in any of the other arguments.
     * @meta
     */
    public static function arrayUdiff(): array
    {
        return call_user_func_array('array_udiff', func_get_args());
    }

    /**
     * Computes the intersection of arrays with additional index check, compares data by a callback function
     * @link https://php.net/manual/en/function.array-uintersect-assoc.php
     * @param array $array1 <p>
     * The first array.
     * </p>
     * @param array $array2 <p>
     * The second array.
     * </p>
     * @param array ...$_ [optional]
     * @param callable $data_compare_func <p>
     * For comparison is used the user supplied callback function.
     * It must return an integer less than, equal
     * to, or greater than zero if the first argument is considered to
     * be respectively less than, equal to, or greater than the
     * second.
     * </p>
     * @return array an array containing all the values of
     * array1 that are present in all the arguments.
     * @meta
     */
    public static function arrayUintersectAssoc(): array
    {
        return call_user_func_array('array_uintersect_assoc', func_get_args());
    }

    /**
     * Computes the intersection of arrays with additional index check, compares data and indexes by separate callback functions
     * @link https://php.net/manual/en/function.array-uintersect-uassoc.php
     * @param array $array1 <p>
     * The first array.
     * </p>
     * @param array $array2 <p>
     * The second array.
     * </p>
     * @param array ...$_ [optional]
     * @param callable $data_compare_func <p>
     * For comparison is used the user supplied callback function.
     * It must return an integer less than, equal
     * to, or greater than zero if the first argument is considered to
     * be respectively less than, equal to, or greater than the
     * second.
     * </p>
     * @param callable $key_compare_func <p>
     * Key comparison callback function.
     * </p>
     * @return array an array containing all the values of
     * array1 that are present in all the arguments.
     * @meta
     */
    #[Pure]
    public static function arrayUintersectUassoc(): array
    {
        return call_user_func_array('array_uintersect_uassoc', func_get_args());
    }

    /**
     * Computes the intersection of arrays, compares data by a callback function
     * @link https://php.net/manual/en/function.array-uintersect.php
     * @param array $array1 <p>
     * The first array.
     * </p>
     * @param array $array2 <p>
     * The second array.
     * </p>
     * @param array ...$_ [optional]
     * @param callable $data_compare_func <p>
     * The callback comparison function.
     * </p>
     * <p>
     * The user supplied callback function is used for comparison.
     * It must return an integer less than, equal to, or greater than zero if
     * the first argument is considered to be respectively less than, equal
     * to, or greater than the second.
     * </p>
     * @return array an array containing all the values of array1
     * that are present in all the arguments.
     * @meta
     */
    public static function arrayUintersect(): array
    {
        return call_user_func_array('array_uintersect', func_get_args());
    }

    /**
     * Removes duplicate values from an array
     * @link https://php.net/manual/en/function.array-unique.php
     * @param array $array <p>
     * The input array.
     * </p>
     * @param int $flags [optional] <p>
     * The optional second parameter sort_flags
     * may be used to modify the sorting behavior using these values:
     * </p>
     * <p>
     * Sorting type flags:
     * </p><ul>
     * <li>
     * <b>SORT_REGULAR</b> - compare items normally
     * (don't change types)
     * </li>
     * <li>
     * <b>SORT_NUMERIC</b> - compare items numerically
     * </li>
     * <li>
     * <b>SORT_STRING</b> - compare items as strings
     * </li>
     * <li>
     * <b>SORT_LOCALE_STRING</b> - compare items as strings,
     * based on the current locale
     * </li>
     * </ul>
     * @return array the filtered array.
     * @meta
     */
    #[Pure]
    public static function arrayUnique(array $array, int $flags = SORT_STRING): array
    {
        return array_unique($array, $flags);
    }

    /**
     * Prepend elements to the beginning of an array
     * Since 7.3.0 this function can be called with only one parameter.
     * For earlier versions at least two parameters are required.
     * @link https://php.net/manual/en/function.array-unshift.php
     * @param array &$array <p>
     * The input array.
     * </p>
     * @param mixed ...$values [optional] <p>
     * The prepended variables.
     * </p>
     * @return int the number of elements in the array.
     */
    public static function arrayUnshift(array &$array, mixed ...$values): int
    {
        return call_user_func_array('array_unshift', func_get_args());
    }

    /**
     * Return all the values of an array
     * @link https://php.net/manual/en/function.array-values.php
     * @param array $array <p>
     * The array.
     * </p>
     * @return array an indexed array of values.
     * @meta
     */
    #[Pure]
    public static function arrayValues(array $array): array
    {
        return array_values($array);
    }

    /**
     * Apply a user function recursively to every member of an array
     * @link https://php.net/manual/en/function.array-walk-recursive.php
     * @param array|object &$array <p>
     * The input array.
     * </p>
     * @param callable $callback <p>
     * Typically, funcname takes on two parameters.
     * The input parameter's value being the first, and
     * the key/index second.
     * </p>
     * <p>
     * If funcname needs to be working with the
     * actual values of the array, specify the first parameter of
     * funcname as a
     * reference. Then,
     * any changes made to those elements will be made in the
     * original array itself.
     * </p>
     * @param mixed $arg [optional] <p>
     * If the optional userdata parameter is supplied,
     * it will be passed as the third parameter to the callback
     * funcname.
     * </p>
     * @return bool true on success or false on failure.
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

    /**
     * Sort an array in reverse order and maintain index association
     * @link https://php.net/manual/en/function.arsort.php
     * @param array &$array <p>
     * The input array.
     * </p>
     * @param int $flags [optional] <p>
     * You may modify the behavior of the sort using the optional parameter
     * sort_flags, for details see
     * sort.
     * </p>
     * @return bool true on success or false on failure.
     */
    public static function arsort(array &$array, int $flags = SORT_REGULAR): bool
    {
        return arsort($array, $flags);
    }

    /**
     * Sort an array and maintain index association
     * @link https://php.net/manual/en/function.asort.php
     * @param array &$array <p>
     * The input array.
     * </p>
     * @param int $flags [optional] <p>
     * You may modify the behavior of the sort using the optional
     * parameter sort_flags, for details
     * see sort.
     * </p>
     * @return bool true on success or false on failure.
     */
    public static function asort(array &$array, int $flags = SORT_REGULAR): bool
    {
        return asort($array, $flags);
    }

    /**
     * Create array containing variables and their values
     * @link https://php.net/manual/en/function.compact.php
     * @param mixed $var_name <p>
     * compact takes a variable number of parameters.
     * Each parameter can be either a string containing the name of the
     * variable, or an array of variable names. The array can contain other
     * arrays of variable names inside it; compact
     * handles it recursively.
     * </p>
     * @param mixed ...$var_names [optional]
     * @return array the output array with all the variables added to it.
     */
    #[Pure]
    public static function compact(array|string $var_name, array|string ...$var_names): array
    {
        return call_user_func_array('compact', func_get_args());
    }

    /**
     * Counts all elements in an array, or something in an object.
     * <p>For objects, if you have SPL installed, you can hook into count() by implementing interface {@see Countable}.
     * The interface has exactly one method, {@see Countable::count()}, which returns the return value for the count() function.
     * Please see the {@see Array} section of the manual for a detailed explanation of how arrays are implemented and used in PHP.</p>
     * @link https://php.net/manual/en/function.count.php
     * @param array|Countable $value The array or the object.
     * @param int $mode [optional] If the optional mode parameter is set to
     * COUNT_RECURSIVE (or 1), count
     * will recursively count the array. This is particularly useful for
     * counting all the elements of a multidimensional array. count does not detect infinite recursion.
     * @return int the number of elements in var, which is
     * typically an array, since anything else will have one
     * element.
     * <p>
     * If var is not an array or an object with
     * implemented Countable interface,
     * 1 will be returned.
     * There is one exception, if var is null,
     * 0 will be returned.
     * </p>
     * <p>
     * Caution: count may return 0 for a variable that isn't set,
     * but it may also return 0 for a variable that has been initialized with an
     * empty array. Use isset to test if a variable is set.
     * </p>
     */
    #[Pure]
    public static function count(Countable|array $value, int $mode = COUNT_NORMAL): int
    {
        return count($value, $mode);
    }

    /**
     * Return the current element in an array
     * @link https://php.net/manual/en/function.current.php
     * @param array|object $array <p>
     * The array.
     * </p>
     * @return mixed|false The current function simply returns the
     * value of the array element that's currently being pointed to by the
     * internal pointer. It does not move the pointer in any way. If the
     * internal pointer points beyond the end of the elements list or the array is
     * empty, current returns false.
     * @meta
     */
    #[Pure]
    public static function current(array|object $array): mixed
    {
        return current($array);
    }

    /**
     * Set the internal pointer of an array to its last element
     * @link https://php.net/manual/en/function.end.php
     * @param array|object &$array <p>
     * The array. This array is passed by reference because it is modified by
     * the function. This means you must pass it a real variable and not
     * a function returning an array because only actual variables may be
     * passed by reference.
     * </p>
     * @return mixed|false the value of the last element or false for empty array.
     * @meta
     */
    public static function end(array|object &$array): mixed
    {
        return end($array);
    }

    /**
     * Checks if a value exists in an array
     * @link https://php.net/manual/en/function.in-array.php
     * @param mixed $needle <p>
     * The searched value.
     * </p>
     * <p>
     * If needle is a string, the comparison is done
     * in a case-sensitive manner.
     * </p>
     * @param array $haystack <p>
     * The array.
     * </p>
     * @param bool $strict [optional] <p>
     * If the third parameter strict is set to true
     * then the in_array function will also check the
     * types of the
     * needle in the haystack.
     * </p>
     * @return bool true if needle is found in the array,
     * false otherwise.
     */
    #[Pure]
    public static function inArray(mixed $needle, array $haystack, bool $strict = false): bool
    {
        return in_array($needle, $haystack, $strict);
    }

    /**
     * Checks if the given key or index exists in the array. The name of this function is array_key_exists() in PHP > 4.0.6.
     * @link https://php.net/manual/en/function.array-key-exists.php
     * @param int|string $key <p>
     * Value to check.
     * </p>
     * @param array $array <p>
     * An array with keys to check.
     * </p>
     * @return bool true on success or false on failure.
     */
    #[Pure]
    public static function keyExists(string|int $key, array $array): bool
    {
        return key_exists($key, $array);
    }

    /**
     * Fetch a key from an array
     * @link https://php.net/manual/en/function.key.php
     * @param array|object $array <p>
     * The array.
     * </p>
     * @return int|string|null The key function simply returns the
     * key of the array element that's currently being pointed to by the
     * internal pointer. It does not move the pointer in any way. If the
     * internal pointer points beyond the end of the elements list or the array is
     * empty, key returns null.
     */
    #[Pure]
    public static function key(array|object $array): int|string|null
    {
        return key($array);
    }

    /**
     * Sort an array by key in reverse order
     * @link https://php.net/manual/en/function.krsort.php
     * @param array &$array <p>
     * The input array.
     * </p>
     * @param int $flags [optional] <p>
     * You may modify the behavior of the sort using the optional parameter
     * sort_flags, for details see
     * sort.
     * </p>
     * @return bool true on success or false on failure.
     */
    public static function krsort(array &$array, int $flags = SORT_REGULAR): bool
    {
        return krsort($array, $flags);
    }

    /**
     * Sort an array by key
     * @link https://php.net/manual/en/function.ksort.php
     * @param array &$array <p>
     * The input array.
     * </p>
     * @param int $flags [optional] <p>
     * You may modify the behavior of the sort using the optional
     * parameter sort_flags, for details
     * see sort.
     * </p>
     * @return bool true on success or false on failure.
     */
    public static function ksort(array &$array, int $flags = SORT_REGULAR): bool
    {
        return ksort($array, $flags);
    }

    /**
     * Sort an array using a case insensitive "natural order" algorithm
     * @link https://php.net/manual/en/function.natcasesort.php
     * @param array &$array <p>
     * The input array.
     * </p>
     * @return bool true on success or false on failure.
     */
    public static function natcasesort(array &$array): bool
    {
        return natcasesort($array);
    }

    /**
     * Sort an array using a "natural order" algorithm
     * @link https://php.net/manual/en/function.natsort.php
     * @param array &$array <p>
     * The input array.
     * </p>
     * @return bool true on success or false on failure.
     */
    public static function natsort(array &$array): bool
    {
        return natsort($array);
    }

    /**
     * Advance the internal array pointer of an array
     * @link https://php.net/manual/en/function.next.php
     * @param array|object &$array <p>
     * The array being affected.
     * </p>
     * @return mixed|false the array value in the next place that's pointed to by the
     * internal array pointer, or false if there are no more elements.
     * @meta
     */
    public static function next(array|object &$array): mixed
    {
        return next($array);
    }

    /**
     * Alias:
     * {@see current}
     * @link https://php.net/manual/en/function.pos.php
     * @param array|ArrayAccess $array
     * @return mixed
     */
    #[Pure]
    public static function pos(array|ArrayAccess $array): mixed
    {
        return pos($array);
    }

    /**
     * Rewind the internal array pointer
     * @link https://php.net/manual/en/function.prev.php
     * @param array|object &$array <p>
     * The input array.
     * </p>
     * @return mixed|false the array value in the previous place that's pointed to by
     * the internal array pointer, or false if there are no more
     * elements.
     * @meta
     */
    public static function prev(array|object &$array): mixed
    {
        return prev($array);
    }

    /**
     * Create an array containing a range of elements
     * @link https://php.net/manual/en/function.range.php
     * @param mixed $start <p>
     * First value of the sequence.
     * </p>
     * @param mixed $end <p>
     * The sequence is ended upon reaching the end value.
     * </p>
     * @param int|float $step [optional] <p>
     * If a step value is given, it will be used as the
     * increment between elements in the sequence. step
     * should be given as a positive number. If not specified,
     * step will default to 1.
     * </p>
     * @return array an array of elements from start to
     * end, inclusive.
     */
    #[Pure]
    public static function range(string|int|float $start, string|int|float $end, int|float $step = 1): array
    {
        return range($start, $end, $step);
    }

    /**
     * Set the internal pointer of an array to its first element
     * @link https://php.net/manual/en/function.reset.php
     * @param array|object &$array <p>
     * The input array.
     * </p>
     * @return mixed|false the value of the first array element, or false if the array is
     * empty.
     * @meta
     */
    public static function reset(array|object &$array): mixed
    {
        return reset($array);
    }

    /**
     * Sort an array in reverse order
     * @link https://php.net/manual/en/function.rsort.php
     * @param array &$array <p>
     * The input array.
     * </p>
     * @param int $flags [optional] <p>
     * You may modify the behavior of the sort using the optional
     * parameter sort_flags, for details see
     * sort.
     * </p>
     * @return bool true on success or false on failure.
     */
    public static function rsort(array &$array, int $flags = SORT_REGULAR): bool
    {
        return rsort($array, $flags);
    }

    /**
     * Shuffle an array
     * @link https://php.net/manual/en/function.shuffle.php
     * @param array &$array <p>
     * The array.
     * </p>
     * @return bool true on success or false on failure.
     */
    public static function shuffle(array &$array): bool
    {
        return shuffle($array);
    }

    /**
     * Sort an array
     * @link https://php.net/manual/en/function.sort.php
     * @param array &$array <p>
     * The input array.
     * </p>
     * @param int $flags [optional] <p>
     * The optional second parameter sort_flags
     * may be used to modify the sorting behavior using these values.
     * </p>
     * <p>
     * Sorting type flags:<br>
     * SORT_REGULAR - compare items normally
     * (don't change types)</p>
     * @return bool true on success or false on failure.
     */
    public static function sort(array &$array, int $flags = SORT_REGULAR): bool
    {
        return sort($array, $flags);
    }

    /**
     * Sort an array with a user-defined comparison function and maintain index association
     *
     * @link https://php.net/manual/en/function.uasort.php
     * @param array &$array <p>
     * The input array.
     * </p>
     * @param callable $callback <p>
     * See usort and uksort for
     * examples of user-defined comparison functions.
     * </p>
     * @return bool true on success or false on failure.
     */
    public static function uasort(array &$array, callable $callback): bool
    {
        return uasort($array, $callback);
    }

    /**
     * Sort an array by keys using a user-defined comparison function
     *
     * @link https://php.net/manual/en/function.uksort.php
     * @param array &$array <p>
     * The input array.
     * </p>
     * @param callable $callback <p>
     * The callback comparison function.
     * </p>
     * <p>
     * Function cmp_function should accept two
     * parameters which will be filled by pairs of array keys.
     * The comparison function must return an integer less than, equal
     * to, or greater than zero if the first argument is considered to
     * be respectively less than, equal to, or greater than the
     * second.
     * </p>
     * @return bool true on success or false on failure.
     */
    public static function uksort(array &$array, callable $callback): bool
    {
        return uksort($array, $callback);
    }

    /**
     * Sort an array by values using a user-defined comparison function
     *
     * @link https://php.net/manual/en/function.usort.php
     * @param array &$array <p>
     * The input array.
     * </p>
     * @param callable $callback <p>
     * The comparison function must return an integer less than, equal to, or
     * greater than zero if the first argument is considered to be
     * respectively less than, equal to, or greater than the second.
     * </p>
     * @return bool true on success or false on failure.
     */
    public static function usort(array &$array, callable $callback): bool
    {
        return usort($array, $callback);
    }
}