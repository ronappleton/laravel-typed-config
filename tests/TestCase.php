<?php

declare(strict_types=1);

namespace Tests;

use Appleton\TypedConfig\ServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ServiceProvider::class,
        ];
    }

    protected function setConfig($key, $value): void
    {
        config()->set($key, $value);
    }
}
