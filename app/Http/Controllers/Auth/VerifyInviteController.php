<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invite;

class VerifyInviteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $invideCode = $request->input('invite_code');  // haal de invite_code uit de request
        $guest = Invite::where('code', $invideCode)->first(); // zoek de invite_code in de database

        if ($guest) { //
            return view('auth.register', ['guest' => $guest]); // als de invite_code bestaat, stuur de gebruiker naar de registratie pagina
        } else {
            return redirect()->route('login'); // als de invite_code niet bestaat, stuur de gebruiker naar de login pagina
        }
    }
}
