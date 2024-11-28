<?php

declare(strict_types=1);

namespace AbstractFile\Rows\ProductInfo;

use AbstractFile\Rows\RowFactory;

class ProductInfoFactoryRow implements RowFactory
{
    public function parserLine(string $line): array
    {
        $line = $this->sanitize($line);
        $data = explode(";", $line);
        return [
        'name' => (string) $data[0],
        'quantity' => (int) $data[1],
        'price' => (float) $data[2],
        'categorie' => (string) $data[3],
        ];
    }

    public function sanitize(string $line): string
    {
        return trim(str_replace(['\n'], $line, $line));
    }
}
