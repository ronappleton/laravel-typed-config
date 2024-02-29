<?php

declare(strict_types=1);

namespace Tests\Unit;

use Appleton\TypedConfig\Exceptions\InvalidType;
use Appleton\TypedConfig\Facades\TypedConfig as Config;
use Appleton\TypedConfig\TypedConfig;
use stdClass;
use Tests\TestCase;

class ObjectTest extends TestCase
{
    public function testObjectWithoutDefault(): void
    {
        $this->setConfig('some.config.key', new stdClass());
        $this->assertEquals(new stdClass(), Config::object('some.config.key'));
    }

    public function testObjectWithDefault(): void
    {
        $this->assertEquals(new stdClass(), Config::object('some.config.key', new stdClass()));
    }

    public function testObjectWithInvalidType(): void
    {
        $this->setConfig('some.config.key', true);
        $this->expectException(InvalidType::class);
        Config::object('some.config.key');
    }

    public function testUsageWithRepository(): void
    {
        $this->setConfig('some.config.key', new stdClass());
        $this->assertEquals(new stdClass(), config()->object('some.config.key'));
    }
}
