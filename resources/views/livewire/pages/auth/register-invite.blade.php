<?php

use App\Models\User;
use App\Models\Invite;
use App\Providers\RouteServiceProvider;
use App\Events\RegisterInvite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Illuminate\Support\Str;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Mail;

new #[Layout('layouts.guest')] class extends Component {
    public string $name = '';
    public string $email = '';
    public bool $success = false; // Add success property

    /**
     * Handle an incoming registration request.
     */
    public function registerInvite(): void
    {
        $code = Str::random(32); // Generate random code
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        ]);

        $validated['code'] = $code; // Add code to validated data

        //event(new RegisterInvite(($invite = Invite::create($validated))));
        $invite = Invite::create($validated);
        
        Mail::to($invite->email)->send(new InviteCreated($invite));

        $this->success = true;
    }
}; ?>


<div>
    <form wire:submit="registerInvite">
        @if ($success)
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Bedankt voor uw aanmeldverzoek.</strong>
                <span class="block sm:inline"> Bevestig deze via de link in uw mailbox!</span>
            </div>
            <div class="flex justify-end mt-2">

                <a href="{{ route('welcome') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
                    focus:ring-blue-300 font-medium rounded-lg 
                    text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 
                    focus:outline-none dark:focus:ring-blue-800">Terug</a>

            </div>
        @else
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}" wire:navigate>
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register me') }}
                </x-primary-button>
        @endif
</div>
</form>
</div>
