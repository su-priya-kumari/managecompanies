<x-guest-layout>
    {{-- <x-jet-authentication-card>
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
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
   <div class="container">
       <div class="row" style="margin-top: 45px">
           <div class="col-md-4 col-md-offset-4 mx-auto">
               <h4>User Login</h4>
               <hr>
               <form action="{{ route('login') }}" method="post">
                   @csrf
                   <div class="results">
                    @if (Session::get('fail'))
                        <div class="alert alert-success">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                 </div>  
                   <div class="mb-3">
                       <label for="email">Email</label>
                       <input type="text" class="form-control" name="email" placeholder="Enter email"  value="{{old('email')}}">
                       <span class="text-danger">@error('email'){{$message}}@enderror</span>
                   </div>
                   <div class="mb-3">
                       <label for="password">Password</label>
                       <input type="password" class="form-control" name="password" placeholder="Enter password" >
                       <span class="text-danger">@error('password'){{$message}}@enderror</span>
                   </div>
                   <div class="mb-3">
                       <button type="submit" class="btn btn-primary btn-block">Login</button>
                   </div>
                   <hr>
                   {{-- <a href="{{ route('registerpage') }}">Create an new account?</a> --}}
               </form>
           </div>
       </div>
   </div> 
</body>
</html>
</x-guest-layout>
