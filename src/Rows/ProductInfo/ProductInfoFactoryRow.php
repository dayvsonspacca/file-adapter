<?php

declare(strict_types=1);

namespace AbstractFile\Rows\ProductInfo;

use AbstractFile\Rows\RowFactory;

class ProductInfoFactoryRow implements RowFactory
{
    public function parserData(array $data): array
    {
        return [
        'name' => (string) $data[0],
        'quantity' => (int) $data[1],
        'price' => (float) $data[2],
        'categorie' => (string) $data[3],
        ];
    }
}
