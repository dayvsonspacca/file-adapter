<?php

declare(strict_types=1);

namespace AbstractFile\Adapters\CsvAdapter;

use AbstractFile\Exceptions\FailedToReadLineException;
use AbstractFile\Adapters\FileAdapter;
use AbstractFile\Rows\RowFactory;

class StandardCsvAdapter implements FileAdapter
{
    public function handle(string $filePath, RowFactory $rowFactory, bool $ignoreHeader = false): array
    {
        $file = fopen($filePath, 'r');
        $lines = [];
        $lineNumber = 0;

        while ($line = fgets($file)) {
            if (!$line) {
                throw new FailedToReadLineException($lineNumber, __CLASS__);
            }
            $lineNumber++;

            if ($ignoreHeader && $lineNumber === 1) {
                continue;
            }

            $line = (string) $line;
            $lines[] = $rowFactory->parserLine($line);
        }

        return $lines;
    }
}
