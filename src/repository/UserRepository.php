<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        $cookieValue = json_encode($user);
        setcookie("loggedUser", $cookieValue, time() + (3600), "/");

        return new User(
            $user['name'],
            $user['surname'],
            $user['pesel'],
            $user['email'],
            $user['password'],
            $user['phone'],
            $user['zipcode'],
            $user['street'],
            $user['buildingNumber'],
            $user['apartmentNumber'],
            $user['district']
        );
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (name, surname, pesel, email, password, phone, zipcode, street, buildingNumber, apartmentNumber, district)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getPesel(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getPhone(),
            $user->getZipcode(),
            $user->getStreet(),
            $user->getBuildingNumber(),
            $user->getApartmentNumber(),
            $user->getDistrict()
        ]);
    }

    public function checkDatabaseForEmail($email){
        $stmt = $this->database->connect()->prepare('
            SELECT email FROM users
        ');
        $stmt->execute();
        $emailsAll = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($emailsAll as $emailFromDB) {
            if ($emailFromDB['email'] == $email) {
                return true;
            }
        }
        return false;
    }
}