<?php

declare(strict_types=1);

namespace AbstractFile\Rows\UserInfo;

use AbstractFile\Rows\RowFactory;

class UserInfoFactoryRow implements RowFactory
{
  public function parserData(array $data): array
  {
    return [
      'name' => (string) $data[0],
      'age' => (string) $data[1],
      'job' => (string) $data[2],
    ];
  }
}