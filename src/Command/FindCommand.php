<?php

namespace App\Command;

class FindCommand extends Command implements CommandInterface
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
        $key = reset($this->params);

        if (empty($key)) {
            echo 'Find customer with email: ';
            $key = trim(fgets(STDIN, 128));
            echo PHP_EOL;
        }

        $customer = $this->file->find($key);
        if ($customer) {
            print_r($customer);
        } else {
            echo 'Customer not found';
        }
    }
}
