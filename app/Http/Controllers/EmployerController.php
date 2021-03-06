<?php

namespace App\Http\Controllers;


use App\Repositories\IEmployerRepository;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;



class EmployerController extends Controller
{
    /**
     * @var IEmployerRepository
     */
    private $repository;


    /**
     * EmployerController constructor.
     * @param IEmployerRepository $repository
     */
    public function __construct(IEmployerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);



        if($validator->fails())
            return redirect()
                     ->route('registerEmployer')
                     ->withInput();

        $this->repository->Add($request->all());


        return  redirect()
                ->route('login');

    }




    protected function create(array $data)
    {

    }

}
