@extends('layout')
@section('content')
<x-card class="mx-auto mt-24 max-w-lg p-10">
<header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Register
                        </h2>
                        <p class="mb-4">Create an account to post Jobs</p>
                    </header>

                    <form action="/users" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="inline-block text-lg mb-2">
                                Name
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="name"
                                value="{{old('name')}}"
                            />
                            @error('name')
                            <!-- Error Example -->
                            <p class="text-red-500 text-xs mt-1">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Email</label
                            >
                            <input
                                type="email"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email"
                                value="{{old('email')}}"
                            />
                            @error('email')
                            <!-- Error Example -->
                            <p class="text-red-500 text-xs mt-1">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="password"
                                class="inline-block text-lg mb-2"
                            >
                                Password
                            </label>
                            <input
                                type="password"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="password"
                            />
                            @error('password')
                            <!-- Error Example -->
                            <p class="text-red-500 text-xs mt-1">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="password2"
                                class="inline-block text-lg mb-2"
                            >
                                Confirm Password
                            </label>
                            <input
                                type="password"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="password_confirmation"
                            />
                            @error('password_confirmation')
                            <!-- Error Example -->
                            <p class="text-red-500 text-xs mt-1">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <button
                                type="submit"
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Sign Up
                            </button>
                        </div>

                        <div class="mt-8">
                            <p>
                                Already have an account?
                                <a href="/login" class="text-laravel"
                                    >Login</a
                                >
                            </p>
                        </div>
                    </form>


</x-card>
@endsection
