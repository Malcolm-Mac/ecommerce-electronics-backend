<?php

namespace App\Repositories\implementations;

use App\Models\User;
use App\Exceptions\AuthFailedException;
use Illuminate\Support\Facades\Auth;
use App\Repositories\contracts\IAuthRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthRepository implements IAuthRepository
{
    /**
     * Function stores a store
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $user = User::create($data);

        return $user;
    }

    /**
     * Function login
     *
     * @param array $data
     * @return mixed
     */
    public function login($data, $remember_me){
        $user = $this->findByEmail($data['email']);

        if ($user){
            if (Auth::attempt($data, $remember_me)){
                return $user;
            }
            throw new AuthFailedException();
        }
        throw new ModelNotFoundException();

    }

    /**
     * Function finds the user by email
     *
     * @param array $data
     * @return mixed
     */
    public function findByEmail($email): User
    {
        return User::where('email',$email)->firstOrFail();
    }
}
