@extends('master')

<div class="container">
    <div class="text-center my-5">
        @if (Route::has('login'))
            <div class="mb-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-secondary ml-2">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <h1 class="text-muted">EcashBank</h1>
    </div>
</div>
