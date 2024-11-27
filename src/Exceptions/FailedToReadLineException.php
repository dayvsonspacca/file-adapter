<?php

declare(strict_types=1);

namespace AbstractFile\Exceptions;

class FailedToReadLineException extends \Exception
{
    public function __construct(int $lineNumber, string $adapter)
    {
        parent::__construct("Failed to read line: $lineNumber in $adapter", 0, null);
    }
}
