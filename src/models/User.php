<?php

class User
{
    private $name;
    private $surname;
    private $pesel;
    private $email;
    private $password;
    private $phone;
    private $zipcode;
    private $street;
    private $buildingNumber;
    private $apartmentNumber;
    private $district;

    public function __construct($name, $surname, $pesel, $email, $password, $phone, $zipcode, $street, $buildingNumber, $apartmentNumber, $district)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->pesel = $pesel;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->zipcode = $zipcode;
        $this->street = $street;
        $this->buildingNumber = $buildingNumber;
        $this->apartmentNumber = $apartmentNumber;
        $this->district = $district;
    }

    public function getName(){
        return $this->name;
    }

    public function getSurname(){
        return $this->surname;
    }

    public function getPesel(){
        return $this->pesel;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getZipcode(){
        return $this->zipcode;
    }

    public function getStreet(){
        return $this->street;
    }

    public function getBuildingNumber(){
        return $this->buildingNumber;
    }

    public function getApartmentNumber(){
        return $this->apartmentNumber;
    }

    public function getDistrict(){
        return $this->district;
    }
}
