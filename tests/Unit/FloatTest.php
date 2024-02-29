<?php

declare(strict_types=1);

namespace Tests\Unit;

use Appleton\TypedConfig\Exceptions\InvalidType;
use Appleton\TypedConfig\Facades\TypedConfig as Config;
use Tests\TestCase;

class FloatTest extends TestCase
{
    public function testFloatWithoutDefault(): void
    {
        $this->setConfig('some.config.key', 1.5);
        $this->assertEquals(1.5, Config::float('some.config.key'));
    }

    public function testFloatWithDefault(): void
    {
        $this->assertEquals(2.0, Config::float('some.config.key', 2.0));
    }

    public function testFloatWithInvalidType(): void
    {
        $this->setConfig('some.config.key', true);
        $this->expectException(InvalidType::class);
        Config::float('some.config.key');
    }
}
