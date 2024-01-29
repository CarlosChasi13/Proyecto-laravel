<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the user's profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Obtener el usuario actualmente autenticado
        $user = Auth::user();

        // Pasar los datos del usuario a la vista del perfil
        return view('profile.show', ['user' => $user]);
    }
}
