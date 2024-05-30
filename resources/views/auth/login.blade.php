<x-guest-layout>
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
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
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}


    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">

        <div class="brand-logo pb-4 text-center">
            <a href="html/index.html" class="logo-link">
                <img class="logo-light logo-img logo-img-lg" src="./assets/admin/images/logo.png"
                    srcset="./assets/admin/images/logo2x.png 2x" alt="logo">
                <img class="logo-dark logo-img logo-img-lg" src="./assets/admin/images/logo-dark.png"
                    srcset="./assets/admin/images/logo-dark2x.png 2x" alt="logo-dark">
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Sign-In</h4>
                        <div class="nk-block-des">
                            <p>Access the panel using your email and passcode.</p>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="form-control-wrap">
                            <input class="form-control form-control-lg" id="email" type="email" name="email"
                                value="{{ old('email') }}" required autofocus autocomplete="username"
                                placeholder="Enter your email address">
                            <span id="email-error" class="invalid">{{  $errors->get('email')[0] ?? '' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password">Password</label>
                            {{-- <a class="link link-primary link-sm" href="html/pages/auths/auth-reset-v2.html">Forgot
                                Code?</a> --}}
                        </div>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" class="form-control form-control-lg" id="password" name="password"
                                required autocomplete="current-password" placeholder="Enter your passcode">
                        </div>
                        <span id="password-error" class="invalid">{{  $errors->get('password')[0] ?? '' }}</span>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-control-sm custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remember_me" name="remember">
                            <label class="custom-control-label" for="remember_me">Remember me</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                    </div>
                </form>
                {{-- <div class="form-note-s2 text-center pt-4"> New on our platform? <a
                        href="{{ route('register') }}">Create an account</a>
                </div> --}}
            </div>
        </div>
    </div>





</x-guest-layout>
