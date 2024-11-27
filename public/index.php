<?php

use AbstractFile\Adapters\CsvAdapter\CommaCsvAdapter;
use AbstractFile\Rows\ProductInfo\ProductInfoFactoryRow;

require_once __DIR__ . '/../vendor/autoload.php';

$commaCsvAdapter = new CommaCsvAdapter();

print_r($commaCsvAdapter->handle(__DIR__ . '/../tests/csv_files/products_comma.csv', new ProductInfoFactoryRow(), false));
