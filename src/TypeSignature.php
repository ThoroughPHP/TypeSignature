<?php

namespace TypeSignature;

final class TypeSignature
{
    public static function arguments(string ...$types): string
    {
        return implode(', ', $types);
    }

    /**
     * @see http://php.net/manual/en/language.types.boolean.php
     * @return string
     */
    public static function boolean(): string
    {
        return 'bool';
    }

    /**
     * @see http://php.net/manual/en/language.types.integer.php
     * @return string
     */
    public static function integer(): string
    {
        return 'integer';
    }

    /**
     * @see http://php.net/manual/en/language.types.float.php
     * @return string
     */
    public static function float(): string
    {
        return self::union('float', 'double');
    }

    /**
     * @see http://php.net/manual/en/language.types.float.php
     * @return string
     */
    public static function double(): string
    {
        return self::float();
    }

    /**
     * @see http://php.net/manual/en/language.types.string.php
     * @return string
     */
    public static function string(): string
    {
        return 'string';
    }

    /**
     * @see http://php.net/manual/en/language.types.array.php
     * @param string $type
     * @return string
     */
    public static function array(string $type): string
    {
        if ((bool) preg_match('/(?:\[\])$/', $type)) {
            return $type;
        }

        return "{$type}[]";
    }

    /**
     * @see http://php.net/manual/en/language.types.object.php
     * @return string
     */
    public static function object(): string
    {
        return 'object';
    }

    /**
     * @see http://php.net/manual/en/language.types.callable.php
     * @return string
     */
    public static function callable(): string
    {
        return 'callable';
    }

    /**
     * @see http://php.net/manual/en/language.pseudo-types.php#language.types.mixed
     * @return string
     */
    public static function mixed(): string
    {
        return 'mixed';
    }

    /**
     * @see http://php.net/manual/en/language.pseudo-types.php#language.types.number
     * @return string
     */
    public static function number(): string
    {
        return self::union(self::integer(), self::float());
    }

    /**
     * @see http://php.net/manual/en/language.pseudo-types.php#language.types.callback
     * @return string
     */
    public static function callback(): string
    {
        return self::callable();
    }

    public static function union(string ...$types): string
    {
        return implode('|', $types);
    }

    public static function intersection(string ...$types): string
    {
        return implode('&', $types);
    }

    public static function optional(string $type): string
    {
        if (0 === strpos($type, '?')) {
            return $type;
        }

        return "?{$type}";
    }
}