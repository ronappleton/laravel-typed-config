<?php

declare(strict_types=1);

namespace Tests\Unit;

use Appleton\TypedConfig\Exceptions\InvalidType;
use Appleton\TypedConfig\Facades\TypedConfig as Config;
use Tests\TestCase;

class BoolTest extends TestCase
{
    public function testBoolWithoutDefault(): void
    {
        $this->setConfig('some.config.key', true);
        $this->assertTrue(Config::bool('some.config.key'));
    }

    public function testBoolWithDefault(): void
    {
        $this->assertFalse(Config::bool('some.config.key', false));
    }

    public function testBoolWithInvalidType(): void
    {
        $this->setConfig('some.config.key', 'string');
        $this->expectException(InvalidType::class);
        Config::bool('some.config.key');
    }

    public function testUsageWithRepository(): void
    {
        $this->setConfig('some.config.key', true);
        $this->assertTrue(config()->bool('some.config.key'));
    }
}
