<?php

declare(strict_types=1);

namespace Unit;

use Appleton\TypedConfig\Exceptions\InvalidType;
use Appleton\TypedConfig\Facades\TypedConfig as Config;
use Tests\TestCase;

class IntTest extends TestCase
{
    public function testIntWithoutDefault(): void
    {
        $this->setConfig('some.config.key', 1);
        $this->assertEquals(1, Config::int('some.config.key'));
    }

    public function testIntWithDefault(): void
    {
        $this->assertEquals(2, Config::int('some.config.key', 2));
    }

    public function testIntWithInvalidType(): void
    {
        $this->setConfig('some.config.key', true);
        $this->expectException(InvalidType::class);
        Config::int('some.config.key');
    }

    public function testUsageWithRepository(): void
    {
        $this->setConfig('some.config.key', 23);
        $this->assertEquals(23, config()->int('some.config.key'));
    }
}
