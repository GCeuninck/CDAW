<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Mot de passe') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4 row">
                <label for="remember_me" class="flex items-center col">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 col justify-end" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Se connecter') }}
                </x-jet-button>
            </div>
        </form>

        <hr/>
        <div class="flex items-center justify-center mt-2 text-center">
            <div >OU</div>
        </div>     
        <form method="GET" action="{{ route('register') }}">
            @csrf
            
            <div class="flex items-center justify-center mt-2 text-center">
                <div class="bottom-1">
                    <a >
                        <x-jet-button class="ml-4" href="{{ route('register') }}">
                            {{ __("Créer un compte") }}
                        </x-jet-button>
                    </a>
                </div>
            </div>
        </form>
        
    </x-jet-authentication-card>
</x-guest-layout>
