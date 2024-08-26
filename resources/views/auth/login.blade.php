<x-guest-layout>

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <div class="flex justify-center items-center">
            <h1 class="text-4xl font-semibold custom-font-2">
                Login
            </h1>
        </div>

        <div class="flex items-center justify-center mt-2">
            <img src="{{asset('images/logo.png')}}" alt="logo" style="width: 150px;height:200px">
        </div>


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                <a class="underline text-sm  hover:text-gray-900 text-indigo-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>


                <x-button class="ms-4 mt-12" style="margin-left:100px; margin-top:50px;">
                    {{ __('Log in') }}
                </x-button>



                <div class="mt-8 flex justify-center items-center">
                    <p class="text-black text-sm">Don't have an Account?  <a href="{{route('register')}}" class="font-semibold" style="color:#6180cf">Regiter</a></p>
                </div>

        </form>
    </x-authentication-card>
</x-guest-layout>
