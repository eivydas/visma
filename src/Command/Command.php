<?php

namespace App\Command;

use App\File\CustomerFile;

class Command
{
    /**
     * @var CustomerFile
     */
    protected $file;

    /**
     * Command constructor.
     */
    public function __construct()
    {
        $this->file = new CustomerFile();
    }

    /**
     * @param array $params
     * @return array
     */
    protected function parseParams(array $params): array
    {
        $data = [];
        foreach ($params as $key => $value) {
            $tmp = explode(':', $value);
            $data[strtolower(trim($tmp[0]))] = strtolower(trim($tmp[1]) ?? null);
        }

        return $data;
    }

    /**
     * @param string $string
     * @return string
     */
    protected function camelCase(string $string): string
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace(['_', '-'], ' ', $string))));
    }
}
