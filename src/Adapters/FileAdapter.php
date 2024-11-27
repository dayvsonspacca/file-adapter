<?php

declare(strict_types=1);

namespace AbstractFile\Adapters;

use AbstractFile\Rows\RowFactory;

interface FileAdapter
{
    public function handle(string $filePath, RowFactory $rowFactory, bool $ignoreHeader = false): array;
}
