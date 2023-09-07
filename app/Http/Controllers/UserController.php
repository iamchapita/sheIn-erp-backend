<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    protected function validateData($request)
    {
        // Extrayendo las llaves del arreglo de campos a validar
        $keys = array_keys($request);

        // Estableciendo los nombres personalizados de los atributos
        $customAttributes = array(
            $keys[0] => 'Nombre',
            $keys[1] => 'Correo Electrónico',
            $keys[2] => 'Contraseña',
        );

        // Estableciendo reglas de cada campo respectivamente
        $rules = array(
            $keys[0] => ['required', 'string', 'min: 2', 'max:50'],
            $keys[1] => ['required', 'email', 'unique:users'],
            $keys[2] => ['required', 'string', 'regex: /((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,64})/'],
        );

        // Mensajes personalizados para los errores
        $messages = array(
            'required' => 'El campo :attribute es requerido.',
            'unique' => 'El :attribute ya siendo utilizado.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'regex' => 'El campo :attribute debe contener: mayúsculas, minúsculas, números y símbolos. Debe ser mayor de 8 Caractéres.',
        );

        // Validando los datos
        // $fields -> Campos del formulario.
        // $rules -> Reglas para validar campos.
        // $messages -> Mensajes personalizados para mostrar en caso de error.
        $validator = Validator::make($request, $rules, $messages);

        // Estableciendo los nombres de los atributos
        $validator->setAttributeNames($customAttributes);

        return $validator;
    }

    public function register(Request $request)
    {

        // Validate request data
        $validator = $this->validateData($request->all());

        // Return errors if validation error occur.
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }

        // Check if validation pass then create user and auth token. Return the auth token
        if ($validator->passes()) {

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    // 'ability' => $request->ability,
                ]);

                // $token = $user->createToken('auth_token', [$request->ability])->plainTextToken;
                $token = $user->createToken('auth_token', ['noAbility'])->plainTextToken;

                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                ], 200);
            }
        }
    }

    public function login(Request $request)
    {

        if (Auth::attempt($request->only('email', 'password'))) {

            $user = User::where('email', $request['email'])->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(
                [
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'id' => $user->id,
                    'isAdmin' => $user->isAdmin,
                    'isClient' => $user->isClient,
                    'isSeller' => $user->isSeller,
                    'isBanned' => $user->isBanned,
                    'isEnabled' => $user->isEnabled,
                ],
                200
            );
        } else {
            return response()->json(['message' => 'Credenciales Incorrectas.'], 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Cierre de Sesión Completo'], 200);
    }

}
