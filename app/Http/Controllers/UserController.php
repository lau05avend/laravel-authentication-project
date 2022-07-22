<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function signin(SaveUserRequest $request){

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => true,
            'msg' => 'User saved successfully',
            'user' => $user
        ]);
    }

    public function login(Request $request){
        $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
            'devicename' => 'required',
        ]);

        $user = User::where("email","=",$request->email)->first();

        if (isset($user->id)) {
            if (Hash::check($request->password, $user->password)) {
                // creacion del token
                $token = $user->createToken($request->devicename)->plainTextToken;
                return response()->json([
                    'status' => true, 'token' => $token, 'user' => $user
                ]);
            }
            else {
                return response()->json([
                    "status" => false,
                    "msg" => "Contraseña incorrecta.",
                ],404);
            }
        }
        else{
            return response()->json([
                "status" => false,
                "msg" => "Usuario no registrado.",
            ],404);
        }
    }

    public function getProfile($id){
        $user = User::findOrFail(auth()->user()->id);
        return response()->json($user);
    }

    public function updateProfile(SaveUserRequest $request,$id){
        $user = User::findOrFail(auth()->user()->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user);
    }

    public function logout(User $user){
        // $user->tokens()->delete();
        Auth()->User()->tokens()->delete();

        return response()->json(['status' => true, 'message' => 'Logged out' ]);
    }


}
