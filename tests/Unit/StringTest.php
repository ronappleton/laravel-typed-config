<?php

declare(strict_types=1);

namespace Tests\Unit;

use Appleton\TypedConfig\Exceptions\InvalidType;
use Appleton\TypedConfig\Facades\TypedConfig as Config;
use Tests\TestCase;

class StringTest extends TestCase
{
    public function testStringWithoutDefault(): void
    {
        $this->setConfig('some.config.key', 'some value');
        $this->assertEquals('some value', Config::string('some.config.key'));
    }

    public function testStringWithDefault(): void
    {
        $this->assertEquals('some default', Config::string('some.config.key', 'some default'));
    }

    public function testStringWithInvalidType(): void
    {
        $this->setConfig('some.config.key', true);
        $this->expectException(InvalidType::class);
        Config::string('some.config.key');
    }
}
