<?php

declare(strict_types=1);

namespace AbstractFile\Adapters\TxtAdapter;

use AbstractFile\Adapters\FileAdapter;
use AbstractFile\Rows\RowFactory;

class SemicolonTxtAdapter implements FileAdapter
{
    public function handle(string $filePath, RowFactory $rowFactory, bool $ignoreHeader = false): array
    {
        $file = fopen($filePath, 'r');
        $lines = [];
        $lineNumber = 0;

        while ($line = fgets($file)) {
            $lineNumber++;

            if ($ignoreHeader && $lineNumber === 1) {
                continue;
            }

            $lines[] = $rowFactory->parserData(explode(';', $line));
        }

        return $lines;
    }
}
