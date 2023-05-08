{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

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
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



    
 

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/img/favicon.png">
  <title>
      Login page
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />
</head>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">S'identifier</h4>
                                    <p class="mb-0">Entrez votre email et votre mot de passe pour vous connecter</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            <input type="email" name="email" class="form-control form-control-lg" value="test@example.com" aria-label="Email">
                                            @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="password" class="form-control form-control-lg" aria-label="Password" value="password" >
                                            @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Souviens-toi de moi</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">S'identifier</button>
                                        </div>
                                    </form>
                                </div>
                            
                               
                            </div>
                        </div>
                        <div
                            class="col-7 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-10 end-0 text-center justify-content-center flex-column">
                            <div class=" bg-gradient-primary h-100 d-flex flex-column justify-content-center overflow-hidden img-fluid"
                                style="background-image: url('https://img.freepik.com/free-vector/diverse-students-kids-studying-back-school-education-concept-multiracial-pupils-huge-book-piles-sport-ball-backpack-children-read-learn-classes-communicate-line-art-vector-illustration_107791-11176.jpg?w=1380&t=st=1683494935~exp=1683495535~hmac=5d580fd69ab5be24a7bf2fff75734320d7582145f52357cd3bee982b5f432479');       
                                background-repeat: no-repeat;
                                background-size: 1000px;
                                ">
                                <span class="mask bg-gradient-primary opacity-0"></span>
                                
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>