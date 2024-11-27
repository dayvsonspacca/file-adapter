<?php

declare(strict_types=1);

namespace AbstractFile\Rows;

interface RowFactory
{
    public function parserLine(string $line): array;
}
