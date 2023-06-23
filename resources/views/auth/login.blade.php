{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
@extends('layouts.app')

@section('content')
    <div class="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card text-center py-5 px-3 mt-5 rounded-1">
                        <div class="card-head">
                            <h3 class="mb-1">Welcome Back !</h3>
                            <p>Sign in now and enjoy exclusive features!</p>
                        </div>
                        <div class="card-body mt-4">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3 text-start w-75 mx-auto">
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Email" name="email">
                                </div>
                                <div class="mb-3 text-start w-75 mx-auto">
                                    <input type="password" id="inputPassword5" class="form-control"
                                        aria-labelledby="passwordHelpBlock" placeholder="Password" name="password">
                                    <div id="passwordHelpBlock" class="form-text pass-hint">
                                        Your password must be 8-20 characters long
                                    </div>
                                </div>
                                <div class="submit mt-4 mb-3">
                                    <button type="submit" class="btn main-btn text-uppercase form-btn">Login</button>
                                </div>
                            </form>
                            <p class="text-center">Don't have an account? <a href="" class="ms-1 main-color"> Sign
                                    up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
