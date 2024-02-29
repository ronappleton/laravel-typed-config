<?php

declare(strict_types=1);

namespace Tests\Unit;

use Appleton\TypedConfig\Exceptions\InvalidType;
use Appleton\TypedConfig\Facades\TypedConfig as Config;
use Appleton\TypedConfig\TypedConfig;
use Tests\TestCase;

class ClassStringTest extends TestCase
{
    public function testClassStringWithoutDefault(): void
    {
        $this->setConfig('some.config.key', TypedConfig::class);
        $this->assertEquals(TypedConfig::class, Config::classString('some.config.key'));
    }

    public function testClassStringWithDefault(): void
    {
        $this->assertEquals(
            TypedConfig::class,
            Config::classString('some.config.key', TypedConfig::class)
        );
    }

    public function testClassStringWithInvalidType(): void
    {
        $this->setConfig('some.config.key', true);
        $this->expectException(InvalidType::class);
        Config::classString('some.config.key');
    }

    public function testClassStringWithInvalidClass(): void
    {
        $this->setConfig('some.config.key', 'foo');
        $this->expectException(InvalidType::class);
        Config::classString('some.config.key');
    }
}
