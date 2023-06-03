<?php


namespace App\Http\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserService
{
    public function login(Request $request,$credentials)
    {
        if (!auth()->attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }
        $data['user'] = User::whereEmail($request->email)->firstOrFail();
        $data['token'] = $data['user'] ->createToken('assignmentTest')->plainTextToken;
        return $data;
    }

    public function register(Request $request)
    {

     $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        $success['token'] =  $user->createToken('assignmentTest')->plainTextToken;
        $success['user'] =  $user;

        return $success;
    }
}
