{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
@extends('layouts.app')

@section('content')
    <div class="register">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card text-center py-5 px-3 mt-5 rounded-1">
                        <div class="card-head">
                            <h3 class="mb-1">Create Your account</h3>
                            <p>Sign up now and unlock exclusive access!</p>
                        </div>
                        <div class="card-body mt-4">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3 text-start w-75 mx-auto">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="name"
                                        placeholder="Name">
                                </div>

                                <div class="mb-3 text-start w-75 mx-auto">
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Email">
                                </div>
                                <div class="mb-3 text-start w-75 mx-auto">
                                    <input type="password" id="inputPassword5" class="form-control"
                                        aria-labelledby="passwordHelpBlock" placeholder="Password"  name="password">
                                    <div id="passwordHelpBlock" class="form-text pass-hint">
                                        Your password must be 8-20 characters long
                                    </div>
                                </div>
                                <div class="mb-3 text-start w-75 mx-auto">
                                    <input type="password" id="inputPassword5" class="form-control"
                                        aria-labelledby="passwordHelpBlock" placeholder="Password"  name="password_confirmation">
                                    <div id="passwordHelpBlock" class="form-text pass-hint">
                                        Your password must be 8-20 characters long
                                    </div>
                                </div>
                                <div class="submit mt-4 mb-3">
                                    <button type="submit" class="btn main-btn text-uppercase form-btn">Register</button>
                                </div>
                            </form>
                            <p class="text-center">Already have an account? <a href="" class="ms-1 main-color"> Sign
                                    in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
