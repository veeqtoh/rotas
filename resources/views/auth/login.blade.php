@extends('layouts.auth')

    @section('title')
        <title>Login - Rotas admin</title>
    @endsection

    @section('content')
        <main id="content" role="main" class="pt-0 main">
            <!-- Content -->
            <div class="px-3 container-fluid">
                <div class="row">
                    <div class="px-0 col-lg-6 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-light">
                        <!-- Logo & Language -->
                        <div class="top-0 mx-3 mt-3 position-absolute start-0 end-0">
                            <div class="d-none d-lg-flex justify-content-between">
                                <a href="index.html">
                                <img class="w-100" src="{{ asset('admin-assets/img/logos/main.jpg') }}" alt="logo" data-hs-theme-appearance="default" style="min-width: 4rem; max-width: 4rem;">
                                <img class="w-100" src="{{ asset('admin-assets/img/logos/main.jpg') }}" alt="logo" data-hs-theme-appearance="dark" style="min-width: 4rem; max-width: 4rem;">
                                </a>

                            </div>
                        </div>
                        <!-- End Logo & Language -->

                        <div style="max-width: 23rem;">
                            <div class="mb-5 text-center">
                                <img class="img-fluid" src="{{ asset('admin-assets/svg/illustrations/oc-chatting.svg') }}" alt="logo" style="width: 12rem;" data-hs-theme-appearance="default">
                                <img class="img-fluid" src="{{ asset('admin-assets/svg/illustrations-light/oc-chatting.svg') }}" alt="logo" style="width: 12rem;" data-hs-theme-appearance="dark">
                            </div>

                            <div class="mb-5">
                                <h2 class="display-5">Manage drivers and rotas</h2>
                            </div>

                            <!-- List Checked -->
                            <ul class="list-checked list-checked-lg list-checked-primary list-py-2">
                                <li class="list-checked-item">
                                    <span class="mb-1 d-block fw-semi-bold">Ease</span>
                                    Manage drivers with ease
                                </li>

                                <li class="list-checked-item">
                                    <span class="mb-1 d-block fw-semi-bold">Secured</span>
                                    Secured platform
                                </li>
                            </ul>
                            <!-- End List Checked -->

                            <div class="mt-5 row justify-content-between gx-3">
                                <div class="col" style="margin-left: 30%">
                                    <img class="img-fluid" src="{{ asset('admin-assets/svg/brands/amazon.png') }}" alt="Amazon">
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-lg-6 d-flex justify-content-center align-items-center min-vh-lg-100">
                        <div class="w-100 content-space-t-4 content-space-t-lg-2 content-space-b-1" style="max-width: 25rem;">
                            <!-- Form -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="text-center">
                                    <div class="mb-5">
                                        <h1 class="display-5">Log in</h1>
                                        <p>Manage rotas and drivers.</p>
                                    </div>

                                </div>


                                <!-- Form -->

                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                <div class="mb-4">
                                    {{--  <label class="form-label" for="field">Email or Username</label>  --}}
                                    <input type="text" class="form-control form-control-lg" name="field" id="field" tabindex="1" placeholder="Email or Username" aria-label="Email or Username" required autofocus>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="mb-4">
                                    <label class="form-label w-100" for="password" tabindex="0">
                                        <span class="d-flex justify-content-between align-items-center">
                                            <span></span>
                                            {{--  <span>Password</span>  --}}
                                        @if (Route::has('password.request'))
                                            <a class="mb-0 form-label-link" href="{{ route('password.request') }}">Forgot Password?</a>
                                        @endif
                                        </span>
                                    </label>

                                    <div class="input-group input-group-merge">
                                        <input type="password" class="js-toggle-password form-control form-control-lg" name="password" id="password" placeholder="Enter Password" aria-label="Enter Password" required minlength="6" data-hs-toggle-password-options='{
                                                "target": "#changePassTarget",
                                                "defaultClass": "bi-eye-slash",
                                                "showClass": "bi-eye",
                                                "classChangeTarget": "#changePassIcon"
                                                }'>
                                        <a id="changePassTarget" class="input-group-append input-group-text" href="javascript:;">
                                        <i id="changePassIcon" class="bi-eye"></i>
                                        </a>
                                    </div>

                                    <span class="invalid-feedback">Please enter a valid password.</span>
                                </div>
                                <!-- End Form -->

                                <!-- Form Check -->
                                <div class="mb-4 form-check d-flex justify-content-between align-items-center">
                                    <span class="">
                                        <input class="form-check-input" type="checkbox" value="" id="remember-me">
                                        <label class="form-check-label" for="remember-me">
                                            Remember me
                                        </label>
                                    </span>
                                    <span class="">
                                        {{--  <a class="mb-0 form-label-link" href="{{route('magic')}}">Use Magic Link</a>  --}}
                                    </span>
                                </div>
                                <!-- End Form Check -->

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">Sign in</button>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Content -->
        </main>
    @endsection

{{--  <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>  --}}
