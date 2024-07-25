![banner.jpg](banner.jpg)

# Laravel Typed Config

## Deprecated

I have archived this repository, what I didn't know was that 4 days before I produced this package, the Laravel team had just added this functionality to the illuminate config repository class.

[See the commit](https://github.com/laravel/framework/commit/6802941843ffefec6054ed37450b2a53ade72f64)

### Overview

Super simple package, with a super simple job.

Provide type based config value accessors for use within Laravel to avoid
Php Stan complaining about mixed types after fetching a value from a configuration file.

### Installation

```bash
composer require ronappleton/laravel-typed-config
```

### Usage

A facade is registered `TypedConfig`

Import `Appleton\TypedConfig\Facades\TypedConfig`

This will then give you access to:

```php
TypedConfig::string(string $key, string $default = null): string

TypedConfig::int(string $key, int $default = null): int

TypedConfig::bool(string $key, bool $default = null): bool

TypedConfig::array(string $key, array $default = null): array

TypedConfig::float(string $key, float $default = null): float

TypedConfig::object(string $key, object $default = null): object

TypedConfig::classString(string $key, string $default = null): string
```

Note: `classString` is a special case, it will also check the class exists.

Also `Repository` macros have been added to allow the use through the config helper

```php
config()->string('key', 'default')

config()->int('key', 1)
```

for example.
