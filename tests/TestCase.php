<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function setConfig($key, $value): void
    {
        config()->set($key, $value);
    }
}
