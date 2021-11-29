<?php

namespace Elephant\Spl;

use Traversable;

class Spl
{
    /**
     * Return the interfaces which are implemented by the given class
     *
     * @link https://php.net/manual/en/function.class-implements.php
     * @param object|string $object_or_class <p>
     * An object (class instance) or a string (class name).
     * </p>
     * @param bool $autoload [optional] <p>
     * Whether to allow this function to load the class automatically through
     * the __autoload magic
     * method.
     * </p>
     * @return string[]|false An array on success, or false on error.
     */
    #[Pure]
    public static function classImplements(object|string $object_or_class, bool $autoload = true): array|false
    {
        return \class_implements($object_or_class, $autoload);
    }

    /**
     * Return the parent classes of the given class
     *
     * @link https://php.net/manual/en/function.class-parents.php
     * @param object|string $object_or_class <p>
     * An object (class instance) or a string (class name).
     * </p>
     * @param bool $autoload [optional] <p>
     * Whether to allow this function to load the class automatically through
     * the __autoload magic
     * method.
     * </p>
     * @return string[]|false An array on success, or false on error.
     */
    #[Pure]
    public static function classParents(object|string $object_or_class, bool $autoload = true): array|false
    {
        return \class_parents($object_or_class, $autoload);
    }

    /**
     * Return the traits used by the given class
     *
     * @param object|string $object_or_class An object (class instance) or a string (class name).
     * @param bool $autoload Whether to allow this function to load the class automatically through the __autoload() magic method.
     * @return string[]|false An array on success, or false on error.
     * @link https://php.net/manual/en/function.class-uses.php
     * @see class_parents()
     * @see get_declared_traits()
     * @since 5.4
     */
    public static function classUses(object|string $object_or_class, bool $autoload = true): array|false
    {
        return \class_uses($object_or_class, $autoload);
    }

    /**
     * Calls a function for every element in an iterator.
     *
     * @param Traversable $iterator
     * @param callable $callback
     * @param array|null $args
     * @return int
     */
    public static function iteratorApply(Traversable $iterator, callable $callback, ?array $args = null): int
    {
        return \iterator_apply($iterator, $callback, $args);
    }

    /**
     * Count the elements in an iterator
     *
     * @link https://php.net/manual/en/function.iterator-count.php
     * @param Traversable $iterator <p>
     * The iterator being counted.
     * </p>
     * @return int The number of elements in iterator.
     */
    #[Pure]
    public static function iterator_count(Traversable $iterator): int
    {
        return \iterator_count($iterator);
    }

    /**
     * Copy the iterator into an array
     *
     * @link https://php.net/manual/en/function.iterator-to-array.php
     * @param Traversable $iterator <p>
     * The iterator being copied.
     * </p>
     * @param bool $preserve_keys [optional] <p>
     * Whether to use the iterator element keys as index.
     * </p>
     * @return array An array containing the elements of the iterator.
     */
    public static function iteratorToArray(Traversable $iterator, bool $preserve_keys = true): array
    {
        return \iterator_to_array($iterator, $preserve_keys);
    }

    /**
     * Try all registered __autoload() functions to load the requested class
     *
     * @link https://php.net/manual/en/function.spl-autoload-call.php
     * @param string $class <p>
     * The class name being searched.
     * </p>
     * @return void
     * @since 5.1.2
     */
    public static function splAutoloadCall(string $class): void
    {
        \spl_autoload_call($class);
    }

    /**
     * Register and return default file extensions for spl_autoload
     *
     * @link https://php.net/manual/en/function.spl-autoload-extensions.php
     * @param string|null $file_extensions [optional] <p>
     * When calling without an argument, it simply returns the current list
     * of extensions each separated by comma. To modify the list of file
     * extensions, simply invoke the functions with the new list of file
     * extensions to use in a single string with each extensions separated
     * by comma.
     * </p>
     * @return string A comma delimited list of default file extensions for
     * spl_autoload.
     * @since 5.1.2
     */
    public static function splAutoloadExtensions(?string $file_extensions = null): string
    {
        return \spl_autoload_extensions($file_extensions);
    }

    /**
     * Return all registered __autoload() functions
     *
     * @link https://php.net/manual/en/function.spl-autoload-functions.php
     * @return array|false An array of all registered __autoload functions.
     * If the autoload stack is not activated then the return value is false.
     * If no function is registered the return value will be an empty array.
     * @since 5.1.2
     */
    #[LanguageLevelTypeAware(["8.0" => "array"], default: "array|false")]
    public static function splAutoloadFunctions(): array
    {
        return \spl_autoload_functions();
    }

    /**
     * Register given function as __autoload() implementation
     *
     * @link https://php.net/manual/en/function.spl-autoload-register.php
     * @param callable|null $callback [optional] <p>
     * The autoload function being registered.
     * If no parameter is provided, then the default implementation of
     * spl_autoload will be registered.
     * </p>
     * @param bool $throw This parameter specifies whether spl_autoload_register() should throw exceptions when the
     * autoload_function cannot be registered. Ignored since since 8.0.
     * @param bool $prepend If true, spl_autoload_register() will prepend the autoloader on the autoload stack instead of
     * appending it.
     * @return bool true on success or false on failure.
     * @throws TypeError Since 8.0.
     * @since 5.1.2
     */
    public static function splAutoloadRegister(?callable $callback = null, bool $throw = true,
                                               bool      $prepend = false): bool
    {
        return \spl_autoload_register($callback, $throw, $prepend);
    }

    /**
     * Unregister given function as __autoload() implementation
     *
     * @link https://php.net/manual/en/function.spl-autoload-unregister.php
     * @param callable $callback <p>
     * The autoload function being unregistered.
     * </p>
     * @return bool true on success or false on failure.
     * @since 5.1.2
     */
    public static function splAutoloadUnregister(callable $callback): bool
    {
        return \spl_autoload_unregister($callback);
    }

    /**
     * Default implementation for __autoload()
     *
     * @link https://php.net/manual/en/function.spl-autoload.php
     * @param string $class <p>
     * </p>
     * @param string|null $file_extensions [optional] <p>
     * By default it checks all include paths to
     * contain filenames built up by the lowercase class name appended by the
     * filename extensions .inc and .php.
     * </p>
     * @return void
     * @since 5.1.2
     */
    public static function splAutoload(string $class, ?string $file_extensions = null): void
    {
        \spl_autoload($class, $file_extensions);
    }

    /**
     * Return available SPL classes
     *
     * @link https://php.net/manual/en/function.spl-classes.php
     * @return array
     */
    #[Pure]
    public static function splClasses(): array
    {
        return \spl_classes();
    }

    /**
     * Return hash id for given object
     *
     * @link https://php.net/manual/en/function.spl-object-hash.php
     * @param object $object
     * @return string A string that is unique for each object and is always the same for
     * the same object.
     */
    #[Pure]
    public static function spl_object_hash(object $object): string
    {
        return \spl_object_hash($object);
    }

    /**
     * Return the integer object handle for given object
     *
     * @param object $object
     * @return int
     * @since 7.2
     */
    public static function splObjectId(object $object): int
    {
        return \spl_object_id($object);
    }
}