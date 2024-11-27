<?php

use AbstractFile\Adapters\CsvAdapter\StandardCsvAdapter;
use AbstractFile\Rows\ProductInfo\ProductInfoFactoryRow;

require_once __DIR__ . '/../vendor/autoload.php';

$standardCsvAdapter = new StandardCsvAdapter();

print_r($standardCsvAdapter->handle(__DIR__ . '/../tests/csv_files/products_semicolon.csv', new ProductInfoFactoryRow(), false));
