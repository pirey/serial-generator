<?php

namespace Pirey;

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
class CodeGenerator
{
    /**
     * Generate formatted code for $code
     *
     */
    public static function make($code, $prefix, $len = 10)
    {
        $prefixLen = strlen($prefix);
        return $prefix . str_pad($code, $len - $prefixLen, '0', STR_PAD_LEFT);
    }

    /**
     * Get first code entry
     *
     * the format is
     * {prefix} {zeros}
     *
     * e.g INV000000
     *
     */
    public static function first($prefix, $len = 10)
    {
        $prefixLen = strlen($prefix);
        return $prefix . str_pad('', $len - $prefixLen, '0', STR_PAD_LEFT);
    }

    /**
     * Alias for first
     *
     */
    public static function initial($prefix, $len = 10)
    {
        return static::first($prefix, $len);
    }

    /**
     * Calculate model's next code based on the current code
     *
     * e.g. if current code is INV00001
     * then the next code generated is INV00002
     */
    public static function next($currentCode, $prefix, $overrideLen = null)
    {
        $len = $overrideLen ? $overrideLen : strlen($currentCode);

        // get last code number, e.g. INV0003, get the number '3'
        $splitted = explode($prefix, $currentCode);
        $lastCode_ = ltrim(array_pop($splitted), '0');
        $lastCode = strlen($lastCode_) <= 0 ? 0 : $lastCode_;

        if (!is_numeric($lastCode)) {
            // here, $currentCode is using custom format
            throw new \InvalidArgumentException("Cannot calculate next code from $currentCode");
        }

        $nextCode = $lastCode ? $lastCode + 1 : 1;

        // $nextCodeStr = $prefix . str_pad($nextCode, $len - $prefixLen, '0', STR_PAD_LEFT);
        $nextCodeStr = static::make($nextCode, $prefix, $len);

        return $nextCodeStr;
    }
}
