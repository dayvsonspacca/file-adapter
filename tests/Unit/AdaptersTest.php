<?php

use AbstractFile\Adapters\CsvAdapter\StandardCsvAdapter;
use AbstractFile\Adapters\TxtAdapter\StandardTxtAdapter;
use AbstractFile\Adapters\XlsxAdapter\PhpOfficeXlsxAdapter;
use AbstractFile\Rows\UserInfo\UserInfoFactoryRow;

describe('Adapters should process files consistently', function () {
    $processFile = function (string $adapterClass, string $filePath) {
        return (new $adapterClass())->handle($filePath, new UserInfoFactoryRow());
    };

    it('StandardCsvAdapter should equal StandardTxtAdapter', function () use ($processFile) {
        $csvResult = $processFile(StandardCsvAdapter::class, __DIR__ . '/../../files/csv_files/users_semicolon.csv');
        $txtResult = $processFile(StandardTxtAdapter::class, __DIR__ . '/../../files/txt_files/users_semicolon.txt');

        expect($csvResult)
            ->toEqual($txtResult, 'CSV and TXT adapters did not produce identical results.');
    });

    it('StandardTxtAdapter should equal PhpOfficeXlsxAdapter', function () use ($processFile) {
        $txtResult = $processFile(StandardTxtAdapter::class, __DIR__ . '/../../files/txt_files/users_semicolon.txt');
        $xlsxResult = $processFile(PhpOfficeXlsxAdapter::class, __DIR__ . '/../../files/xlsx_files/users.xlsx');

        expect($xlsxResult)
            ->toEqual($txtResult, 'TXT and XLSX adapters did not produce identical results.');
    });

    it('StandardCsvAdapter should equal PhpOfficeXlsxAdapter', function () use ($processFile) {
        $csvResult = $processFile(StandardCsvAdapter::class, __DIR__ . '/../../files/csv_files/users_semicolon.csv');
        $xlsxResult = $processFile(PhpOfficeXlsxAdapter::class, __DIR__ . '/../../files/xlsx_files/users.xlsx');

        expect($xlsxResult)
            ->toEqual($csvResult, 'CSV and XLSX adapters did not produce identical results.');
    });

    it('All adapters should return identical results', function () use ($processFile) {
        $csvResult = $processFile(StandardCsvAdapter::class, __DIR__ . '/../../files/csv_files/users_semicolon.csv');
        $txtResult = $processFile(StandardTxtAdapter::class, __DIR__ . '/../../files/txt_files/users_semicolon.txt');
        $xlsxResult = $processFile(PhpOfficeXlsxAdapter::class, __DIR__ . '/../../files/xlsx_files/users.xlsx');

        expect($csvResult)
            ->toEqual($txtResult, 'CSV and TXT adapters did not produce identical results.')
            ->toEqual($xlsxResult, 'CSV and XLSX adapters did not produce identical results.');
    });
});
