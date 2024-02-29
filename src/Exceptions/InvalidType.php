<?php

declare(strict_types=1);

namespace Appleton\TypedConfig\Exceptions;

use Throwable;

class InvalidType extends \RuntimeException
{
    public function __construct(string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        $message = sprintf('%s, or wrong method used to access config value.', $message);

        parent::__construct($message, $code, $previous);
    }
}
