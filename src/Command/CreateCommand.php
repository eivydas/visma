<?php

namespace App\Command;

use App\Entity\Customer;

class CreateCommand extends Command implements CommandInterface
{
    /**
     * @var array
     */
    private $params = [];

    /**
     * CreateCommand constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        parent::__construct();

        $this->params = $this->parseParams($params);
    }

    /**
     * @return mixed|void
     */
    public function run()
    {
        $customer = new Customer();

        $fields = [
            'first_name',
            'last_name',
            'email',
            'phone_number_1',
            'phone_number_2',
            'comment',
        ];

        foreach ($fields as $value) {
            $setter = 'set' . $this->camelCase($value);

            if (array_key_exists($value, $this->params) && $this->params[$value] != null) {
                $customer->{$setter}($this->params[$value]);
            } else {
                echo 'Enter customer ' . $value . ': ';
                $input = trim(fgets(STDIN, 128));
                $customer->{$setter}($input);
                echo PHP_EOL;
            }
        }

        if ($this->file->create($customer)) {
            echo 'Customer created successfully';
        } else {
            echo 'Something went wrong';
        }
    }
}
