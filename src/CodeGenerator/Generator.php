<?php
namespace CodeGenerator;

/**
 * Helper for generating model's code
 *
 * format of the code is
 * {prefix} {zeros} {code}
 *
 * e.g. INV000023, PRD0000032
 *
 * this helper handles code generation
 *
 */
class Generator
{
    /**
     * Get first code entry
     *
     * the format is
     * {prefix} {zeros}
     *
     * e.g INV000000
     *
     */
    public static function firstCode($prefix, $len = 10)
    {
        $prefixLen = strlen($prefix);
        return $prefix . str_pad('', $len - $prefixLen, '0', STR_PAD_LEFT);
    }

    /**
     * Alias for firstCode
     *
     */
    public static function first($prefix, $len = 10)
    {
        return static::firstCode($prefix, $len);
    }

    /**
     * Calculate model's next code based on the current code
     *
     * e.g. if current code is INV00001
     * then the next code generated is INV00002
     */
    public static function nextCode($currentCode, $prefix, $overrideLen = null)
    {
        $len = $overrideLen ? $overrideLen : strlen($currentCode);
        $prefixLen = strlen($prefix);

        // get last code number, e.g. INV0003, get the number '3'
        $splitted = explode($prefix, $currentCode);
        $lastCode = ltrim(array_pop($splitted), '0');
        $nextCode = $lastCode ? $lastCode + 1 : 1;

        $nextCodeStr = $prefix . str_pad($nextCode, $len - $prefixLen, '0', STR_PAD_LEFT);

        return $nextCodeStr;
    }

    /**
     * Alias for nextCode
     *
     */
    public static function next($currentCode, $prefix, $overrideLen = null)
    {
        return static::nextCode($currentCode, $prefix, $overrideLen);
    }
}
