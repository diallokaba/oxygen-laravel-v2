<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements IUserRepository{
    public function getAllUsers(){
        return User::all();
    }
    public function getUserById($id){
        return User::find($id);
    }
    public function createUser($userData){
        return User::create($userData);
    }
    public function updateUser($id, $userData){
        return User::findAndUpdate($id, $userData);
    }
    public function deleteUser($id){
        return User::findAndDelete($id);
    }
    public function getUserByEmail($email){
        return User::where('email', $email)->first();
    }
    public function getUserByTelephone($telephone){
        return User::where('telephone', $telephone)->first();
    }
    public function getUserByEmailOrTelephone($email, $telephone){
        return User::where('email', $email)->orWhere('telephone', $telephone)->first();
    }
}