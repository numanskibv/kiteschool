<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invite;
use Illuminate\Support\Arr;


class VerifyInviteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $uriSegments = explode('/', request()->getPathInfo());
        $inviteCode = Arr::last($uriSegments);
        $guest = Invite::where('code', $inviteCode)->first(); // zoek de invite_code in de database

        if ($guest) {
            session(
                [
                    'id' => $guest['id'], // sla de id van de uitgenodigde gebruiker op in de sessie
                    'username' =>  $guest['name'],
                    'email' =>  $guest['email'],
                ]
            );

            return redirect()->to('register');
        } else {

            return redirect()->route('login'); // als de invite_code niet bestaat, stuur de gebruiker naar de login pagina
        }
    }
}
