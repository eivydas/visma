<?php

namespace App\File;

use App\Entity\Customer;

class CustomerFile extends File implements FileInterface
{
    private $file = 'customers.json';

    public function __construct()
    {
        parent::__construct($this->file);
    }

    public function create(Customer $customer)
    {
        if (!$this->find($customer->getEmail())) {
            $customers = json_decode($this->read(), true);
            $customers[$customer->getEmail()] = $customer;

            $this->write(json_encode($customers, JSON_PRETTY_PRINT));

            return true;
        } else {
            return false;
        }
    }

    public function delete(string $key)
    {
        $data = json_decode($this->read(), true);
        unset($data[$key]);

        $this->write(json_encode($data, JSON_PRETTY_PRINT));

        return true;
    }

    public function find(string $key)
    {
        $data = json_decode($this->read(), true);

        return $data[$key] ?? null;
    }
}
