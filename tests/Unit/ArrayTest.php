<?php

declare(strict_types=1);

namespace Tests\Unit;

use Appleton\TypedConfig\Exceptions\InvalidType;
use Appleton\TypedConfig\Facades\TypedConfig as Config;
use Tests\TestCase;

class ArrayTest extends TestCase
{
    public function testArrayWithoutDefault(): void
    {
        $this->setConfig('some.config.key', ['foo' => 'bar']);
        $this->assertEquals(['foo' => 'bar'], Config::array('some.config.key'));
    }

    public function testArrayWithDefault(): void
    {
        $this->assertEquals(['foo' => 'bar'], Config::array('some.config.key', ['foo' => 'bar']));
    }

    public function testArrayWithInvalidType(): void
    {
        $this->setConfig('some.config.key', true);
        $this->expectException(InvalidType::class);
        Config::array('some.config.key');
    }

    public function testUsageWithRepository(): void
    {
        $this->setConfig('some.config.key', ['foo' => 'bar']);
        $this->assertEquals(['foo' => 'bar'], config()->array('some.config.key'));
    }
}
