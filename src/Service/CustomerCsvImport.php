<?php

namespace App\Service;

use App\Entity\Customer;
use App\File\CustomerFile;

class CustomerCsvImport
{
    const DELIMITER = ';';

    const FIRST_NAME = 0;
    const LAST_NAME = 1;
    const EMAIL = 2;
    const PHONE_NUMBER_1 = 3;
    const PHONE_NUMBER_2 = 4;
    const COMMENT = 5;

    /**
     * @param string $file
     * @return bool
     */
    static function run(string $file)
    {
        $handle = fopen($file, "r");

        while ($row = fgetcsv($handle, 0, self::DELIMITER)) {
            $customer = new Customer();
            $customer->setFirstName($row[self::FIRST_NAME]);
            $customer->setLastName($row[self::LAST_NAME]);
            $customer->setEmail($row[self::EMAIL]);
            $customer->setPhoneNumber1($row[self::PHONE_NUMBER_1]);
            $customer->setPhoneNumber2($row[self::PHONE_NUMBER_2]);
            $customer->setComment($row[self::COMMENT]);

            $customerFile = new CustomerFile();
            $customerFile->create($customer);
        }
        fclose($handle);

        return true;
    }
}
