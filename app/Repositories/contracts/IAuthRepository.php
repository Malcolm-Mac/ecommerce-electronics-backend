<?php

namespace App\Repositories\contracts;

interface IAuthRepository
{
    public function create(array $data);

    public function login($data, $remember_me);
}
