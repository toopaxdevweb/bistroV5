<?php 

namespace App\Service;

use App\Repository\UserRepository;

class GetUser 
{
    private $repo;

    public function __construct(UserRepository $ur)
    {
        $this->repo = $ur;
    }
    
    public function getAllUser()
    {
        $users = $this->repo->findAll();
        return $users;
    } 
}