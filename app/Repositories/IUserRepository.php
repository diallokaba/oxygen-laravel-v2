<?php

namespace App\Repositories;

interface IUserRepository{
    public function getAllUsers();
    public function getUserById($id);
    public function createUser($userData);
    public function updateUser($id, $userData);
    public function deleteUser($id);
    public function getUserByEmail($email);
    public function getUserByTelephone($telephone);
    public function getUserByEmailOrTelephone($email, $telephone);
}