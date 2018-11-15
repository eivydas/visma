<?php

namespace App\Command;

class DeleteCommand extends Command implements CommandInterface
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
            echo 'Delete customer with email: ';
            $key = trim(fgets(STDIN, 128));
            echo PHP_EOL;
        }

        if ($this->file->delete($key)) {
            echo 'Customer deleted successfully';
        } else {
            echo 'Something went wrong';
        }
    }
}
