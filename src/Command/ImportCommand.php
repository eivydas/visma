<?php

namespace App\Command;

use App\Service\CustomerCsvImport;

class ImportCommand extends Command implements CommandInterface
{
    /**
     * @var array
     */
    private $params = [];

    /**
     * FindCommand constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        parent::__construct();

        $this->params = $params;
    }

    /**
     * @return mixed|void
     */
    public function run()
    {
        $file = reset($this->params);

        while (empty($file) || !file_exists($file) || !is_file($file)) {
            echo 'Provide full .csv file path: ';
            $file = trim(fgets(STDIN, 1024));
            echo PHP_EOL;
        }

        if (CustomerCsvImport::run($file)) {
            echo 'Customers imported successfully';
        } else {
            echo 'Something went wrong';
        }
    }
}
