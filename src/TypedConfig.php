<?php

declare(strict_types=1);

namespace Appleton\TypedConfig;

use Appleton\TypedConfig\Exceptions\InvalidType;

class TypedConfig
{
    public function string(string $key, ?string $default = null): string
    {
        $value = config($key, $default);

        if (! is_string($value)) {
            throw new InvalidType(sprintf('%s must be a string', $key));
        }

        return $value;
    }

    public function int(string $key, ?int $default = null): int
    {
        $value = config($key, $default);

        if (! is_int($value)) {
            throw new InvalidType(sprintf('%s must be an integer', $key));
        }

        return $value;
    }

    public function bool(string $key, ?bool $default = null): bool
    {
        $value = config($key, $default);

        if (! is_bool($value)) {
            throw new InvalidType(sprintf('%s must be a boolean', $key));
        }

        return $value;
    }

    /**
     * @param  array<mixed, mixed>  $default
     * @return array<mixed, mixed>
     */
    public function array(string $key, ?array $default = null): array
    {
        $value = config($key, $default);

        if (! is_array($value)) {
            throw new InvalidType(sprintf('%s must be an array', $key));
        }

        return $value;
    }

    public function float(string $key, ?float $default = null): float
    {
        $value = config($key, $default);

        if (! is_float($value)) {
            throw new InvalidType(sprintf('%s must be a float', $key));
        }

        return $value;
    }

    public function object(string $key, ?object $default = null): object
    {
        $value = config($key, $default);

        if (! is_object($value)) {
            throw new InvalidType(sprintf('%s must be an object', $key));
        }

        return $value;
    }

    /**
     * @param  class-string  $default
     */
    public function classString(string $key, ?string $default = null): string
    {
        $value = $this->string($key, $default);

        if (! class_exists($value)) {
            throw new InvalidType(sprintf('%s must be a class but does not exist', $key));
        }

        return $value;
    }
}
