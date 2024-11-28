<?php

declare(strict_types=1);

namespace AbstractFile\Rows\UserInfo;

use AbstractFile\Rows\RowFactory;

class UserInfoFactoryRow implements RowFactory
{
    public function parserLine(string $line): array
    {
        $line = $this->sanitize($line);

        $data = explode(";", $line);
        return [
        'name' => (string) $data[0],
        'age' => (int) $data[1],
        'job' => (string) $data[2],
        ];
    }

    public function sanitize(string $line): string
    {
        return trim(str_replace(['\n'], $line, $line));
    }
}
