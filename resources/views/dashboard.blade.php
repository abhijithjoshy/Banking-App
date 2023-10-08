@extends('master')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Welcome {{ $user->name ? $user->name : $user->email }}</h2>
                    <hr>
                    Your ID : <b>{{ $user->email }}</b>
                    <hr>
                    Your Balance : <b>{{ $user_history->current_balance }} INR </b>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
