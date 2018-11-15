<?php

namespace App\Entity;

class Customer implements \JsonSerializable
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phoneNumber1;

    /**
     * @var string
     */
    private $phoneNumber2;

    /**
     * @var string
     */
    private $comment;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhoneNumber1(): string
    {
        return $this->phoneNumber1;
    }

    /**
     * @param string $phoneNumber1
     */
    public function setPhoneNumber1(string $phoneNumber1): void
    {
        $this->phoneNumber1 = $phoneNumber1;
    }

    /**
     * @return string
     */
    public function getPhoneNumber2(): string
    {
        return $this->phoneNumber2;
    }

    /**
     * @param string $phoneNumber2
     */
    public function setPhoneNumber2(string $phoneNumber2): void
    {
        $this->phoneNumber2 = $phoneNumber2;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'email' => $this->getEmail(),
            'phone_number_1' => $this->getPhoneNumber1(),
            'phone_number_2' => $this->getPhoneNumber2(),
            'comment' => $this->getComment(),
        ];
    }
}
