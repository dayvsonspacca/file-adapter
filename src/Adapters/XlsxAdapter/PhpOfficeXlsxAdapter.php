<?php

declare(strict_types=1);

namespace AbstractFile\Adapters\XlsxAdapter;

use AbstractFile\Adapters\FileAdapter;
use AbstractFile\Rows\RowFactory;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PhpOfficeXlsxAdapter implements FileAdapter
{
    public function handle(string $filePath, RowFactory $rowFactory, bool $ignoreHeader = false): array
    {
        $spreadsheet = IOFactory::load($filePath);
        $lines = [];

        $sheet = $spreadsheet->getActiveSheet();

        foreach ($sheet->getRowIterator() as $lineNumber => $row) {
            if ($ignoreHeader && $lineNumber === 1) {
                continue;
            }

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $line = [];
            foreach ($cellIterator as $cell) {
                $line[] = $cell->getValue();
            }

            $lines[] = $rowFactory->parserLine(implode(";", $line));
        }
        return $lines;
    }
}
