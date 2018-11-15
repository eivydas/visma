<?php

namespace App\File;

class File
{
    const PATH = __DIR__ . '/../../storage/';

    /**
     * @var string
     */
    private $file;

    /**
     * File constructor.
     * @param string $fileName
     */
    public function __construct(string $fileName)
    {
        $this->file = self::PATH . $fileName;
    }

    /**
     * @return bool|string
     */
    public function read()
    {
        if (!file_exists($this->file)) {
            $this->write(json_encode([]));
        }

        return file_get_contents($this->file);
    }

    /**
     * @param $data
     * @return bool|int
     */
    public function write($data)
    {
        return file_put_contents($this->file, $data);
    }
}
