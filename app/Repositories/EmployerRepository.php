<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 6/11/2018
 * Time: 2:57 PM
 */

namespace App\Repositories;


use App\Employer;
use App\User;

class EmployerRepository implements IEmployerRepository
{

    /**
     * @param array $data
     * @return Employer
     */
    public function Add(array $data)
    {
        /** @var Employer $employer */
        $employer = new Employer();
        $employer->name = $data['name'];
        $employer->description = $data['description'];


        /** @var User $employer */
        $user = new User();
        $user->password = bcrypt($data['password']);
        $user->email = $data['email'];

        $employer->save();
        $employer->user()->save($user);

        return $employer;
    }
}