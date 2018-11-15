<?php

namespace App\Tests;

use App\Entity\Customer;
use App\File\CustomerFile;
use PHPUnit\Framework\TestCase;

class CustomerFileTest extends TestCase
{
    private $file;
    private static $email;

    public static function setUpBeforeClass()
    {
        self::$email = rand(1000000, 9999999) . '@mail.com';
    }

    protected function setUp()
    {
        $this->file = new CustomerFile();

        $this->assertInstanceOf('App\File\CustomerFile', $this->file);
    }

    public function testSerialization()
    {
        $customer = new Customer();
        $customer->setFirstName('firstname');
        $customer->setLastName('lastname');
        $customer->setEmail('email');
        $customer->setPhoneNumber1('phonenumber1');
        $customer->setPhoneNumber2('phonenumber2');
        $customer->setComment('comment');

        $this->assertSame('{"first_name":"firstname","last_name":"lastname","email":"email","phone_number_1":"phonenumber1","phone_number_2":"phonenumber2","comment":"comment"}', json_encode($customer));
    }

    public function testCreate()
    {
        $customer = new Customer();
        $customer->setFirstName('firstname');
        $customer->setLastName('lastname');
        $customer->setEmail(self::$email);
        $customer->setPhoneNumber1('phonenumber1');
        $customer->setPhoneNumber2('phonenumber2');
        $customer->setComment('comment');

        $this->assertSame(true, $this->file->create($customer));
    }

    public function testDuplicateCreate()
    {
        $customer = new Customer();
        $customer->setFirstName('firstname');
        $customer->setLastName('lastname');
        $customer->setEmail(self::$email);
        $customer->setPhoneNumber1('phonenumber1');
        $customer->setPhoneNumber2('phonenumber2');
        $customer->setComment('comment');

        $this->assertSame(false, $this->file->create($customer));
    }

    public function testFind()
    {
        $this->assertSame(['first_name' => 'firstname', 'last_name' => 'lastname', 'email' => self::$email, 'phone_number_1' => 'phonenumber1', 'phone_number_2' => 'phonenumber2', 'comment' => 'comment'], $this->file->find(self::$email));
    }

    public function testDelete()
    {
        $this->assertSame(true, $this->file->delete(self::$email));
    }
}
