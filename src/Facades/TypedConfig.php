<?php

declare(strict_types=1);

namespace Appleton\TypedConfig\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Appleton\TypedConfig\TypedConfig
 *
 * @method static string string(string $key, string $default = null)
 * @method static int int(string $key, int $default = null)
 * @method static bool bool(string $key, bool $default = false)
 * @method static float float(string $key, float $default = null)
 * @method static array array(string $key, array $default = null)
 * @method static object object(string $key, object $default = null)
 * @method static string classString(string $key, string $default = null)
 */
class TypedConfig extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Appleton\TypedConfig\TypedConfig::class;
    }
}
