<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Passport;

class CustomAuthController extends Controller
{
    # TODO - Refactor all method to not use guard web, it's provisory for frontend can build the screens with bearer token
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = request(['email', 'password']);

        if(! $user = Auth::guard('web')->attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = Auth::guard('web')->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me) {
            $token->expires_at = now()->addDays(Passport::token()->expiresAt->diffInDays());
        }

        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => \Carbon\Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            'uuid' => $user->uuid,
            'username' => $user->username,
            'email' => $user->email,
        ]);
    }


//    public function __invoke(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'email' => 'required|string|email|max:255',
//            'password' => 'required|string|min:6',
//        ]);
//        if ($validator->fails())
//        {
//            return response(['errors'=>$validator->errors()->all()], 422);
//        }
//        $user = User::where('email', $request->email)->first();
//        if ($user) {
//            if (\Hash::check($request->password, $user->password)) {
//
//                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
//                $response = ['token' => $token];
//                return response($response, 200);
//            } else {
//                $response = ["message" => "Password mismatch"];
//                return response($response, 422);
//            }
//        } else {
//            $response = ["message" =>'User does not exist'];
//            return response($response, 422);
//        }



//        return response()->json(['error' => 'Unauthorized'], 401);
//
//        dd(Auth::guard('api')->check($credentials));
//
//        // Verifica se o usuário tem a role 'collaborator'
//        if (!Auth::guard('api')->attempt($credentials) || !Auth::guard('api')->user()->hasRole('collaborator')) {
//            return response()->json(['error' => 'Unauthorized'], 401);
//        }
//
//        // Gerar o token de acesso usando o Passport
//        $token = Auth::guard('api')->user()->createToken('Personal Access Token')->accessToken;

//
//        dd($token);
//
//        return response()->json(['token' => $token]);
//    }
}
