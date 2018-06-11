<?php

namespace App\Http\Controllers;

use App\Employer;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class EmployerController extends Controller
{
    public function register(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails())
            return response($validator->errors(), 400);

        $this->create($request->all());

        return response( 200);
    }




    protected function create(array $data)
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
    }


}
