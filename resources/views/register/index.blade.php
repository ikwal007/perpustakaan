@extends('layouts.auth')

@section('mainContainer')
<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="text-indigo-700 mx-auto h-12 w-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
        </svg>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign up your account</h2>
      </div>
      <form class="mt-8 space-y-6" action="/signup" method="post">
        @csrf
        <input type="hidden" name="remember" value="true">
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            @error('name')
              <p class="mt-2 text-left text-sm text-red-600">
                {{ $message }}
              </p>
            @enderror
            <label for="name" class="sr-only">Nama</label>
            <input id="name" name="name" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Name" value="{{ old('name') }}">
          </div>
          <div>
            @error('email')
              <p class="mt-2 text-left text-sm text-red-600">
                {{ $message }}
              </p>
            @enderror
            <label for="email" class="sr-only">Email address</label>
            <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address" value="{{ old('email') }}">
          </div>
          <div>
            @error('password')
              <p class="mt-2 text-left text-sm text-red-600">
                {{ $message }}
              </p>
            @enderror
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
          </div>
        </div>
  
        <div class="grid items-center justify-start sm:flex">
          <div class="grid sm:flex items-center">
            <label for="remember-me" class="sm:ml-2 block text-sm text-gray-900"> Sudah punya akun? </label>
            <a href="/signin" class="sm:pl-1 font-medium text-indigo-600 hover:text-indigo-500 no-underline"> Login Sekarang </a>
          </div>
        </div>
  
        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <!-- Heroicon name: solid/lock-closed -->
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
              </svg>
            </span>
            Register
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection