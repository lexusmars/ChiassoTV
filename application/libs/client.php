<?php


class Client
{
    private $id;
    private $name;
    private $surname;
    private $email;
    // Optional parameter
    private $phone;

    // Constructor
    function __construct(int $id, string $name, string $surname, string $email, $phone=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    public function getFullName(){
        return $this->name . " " . $this->getSurname();
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return null|string
     */
    public function getPhone()
    {
        return $this->phone;
    }


}