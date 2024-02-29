<?php

declare(strict_types=1);

namespace Appleton\TypedConfig;

use Illuminate\Config\Repository;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot(TypedConfig $config): void
    {
        Repository::macro('string', fn (string $key, int $default = null) => $config->string($key, $default));
        Repository::macro('int', fn (string $key, int $default = null) => $config->int($key, $default));
        Repository::macro('bool', fn (string $key, bool $default = null) => $config->bool($key, $default));
        Repository::macro('array', fn (string $key, array $default = null) => $config->array($key, $default));
        Repository::macro('float', fn (string $key, float $default = null) => $config->float($key, $default));
        Repository::macro('object', fn (string $key, object $default = null) => $config->object($key, $default));
        Repository::macro('classString',
            fn (string $key, string $default = null) => $config->classString($key, $default)
        );
    }
}
