<?php

namespace App\File;

use App\Entity\Customer;

interface FileInterface
{
    public function create(Customer $customer);

    public function delete(string $key);

    public function find(string $key);
}
