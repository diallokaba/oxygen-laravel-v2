<?php

namespace App\Services;

use App\Models\Wallet;
use App\Repositories\IUserRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class UserService implements IUserService{

    private $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers(){

    }
    public function getUserById($id){

    }
    public function createUser($userData){
        try{
            DB::beginTransaction();

            $user = $this->userRepository->createUser($userData);
            //create wallet for user
            Wallet::create(['user_id' => $user->id, 'balance' => 0]);

            GenerateQrcodeService::generateQrcode($user);

            DB::commit();
            return $user;
        }catch(Exception $e){
            DB::rollBack();
            throw new Exception('Erreur lors de la création de l\'utilisateur : ' . $e->getMessage());
        }
    }
    public function updateUser($id, $userData){

    }
    public function deleteUser($id){

    }
    public function getUserByEmail($email){

    }
    public function getUserByTelephone($telephone){

    }
    public function getUserByEmailOrTelephone($email, $telephone){

    }
}