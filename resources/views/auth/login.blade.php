@extends('layouts.app')

@section('title', 'Login SIMIKAEL')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-gray-100 flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-5xl rounded-2xl shadow-xl flex overflow-hidden">
        <!-- Left side - Illustration -->
        <div class="hidden lg:block lg:w-1/2 bg-white-100 p-12">
            <img src="{{ asset('assets/img/Nazarick.svg') }}" alt="Login" class="w-full h-auto max-w-lg mx-auto animate-float">
        </div>

        <!-- Right side - Login Form -->
        <div class="w-full lg:w-1/2 p-8 md:p-12 bg-white">
            <!-- Mobile Logo -->
            <div class="lg:hidden text-2xl text-gray-800 font-bold mb-8">SIMIKAEL</div>
            
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Welcome Back</h2>
                <p class="text-gray-600 mt-3">Please enter your credentials to sign in</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <!-- Username field -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <div class="relative">
                        <input 
                            type="text" 
                            id="username" 
                            name="username" 
                            value="{{ old('username') }}" 
                            class="w-full px-4 py-3 rounded-lg bg-gray-100 text-gray-800 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out @error('username') border-red-500 @enderror"
                            placeholder="Enter your username"
                            required
                            autofocus
                        >
                        @error('username')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Password field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="w-full px-4 py-3 rounded-lg bg-gray-100 text-gray-800 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out @error('password') border-red-500 @enderror"
                            placeholder="Enter your password"
                            required
                        >
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Login button -->
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                        Sign In
                    </button>
                </div>
            </form>

            <!-- Mobile Copyright -->
            <div class="lg:hidden text-center text-sm text-gray-500 mt-8">
                © Copyright SIMIKAEL. All Rights Reserved
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    @media screen and (max-width: 640px) {
        body {
            margin: 0;
            min-height: 100vh;
        }
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0% {
            transform: translatey(0px);
        }
        50% {
            transform: translatey(-20px);
        }
        100% {
            transform: translatey(0px);
        }
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const inputs = document.querySelectorAll('input');
        
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focus-within:ring-2', 'focus-within:ring-blue-500');
            });

            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focus-within:ring-2', 'focus-within:ring-blue-500');
            });
        });
    });
</script>