@extends('master')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Withdraw') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <div class="form-group">
                    <label for="exampleInput"></label>
                    <input type="text" class="form-control" id="amount" placeholder="Enter Amount In INR"><br>
                </div>
                <button class="btn btn-primary" onclick="withdraw()">Withdraw</button>

            </div>
        </div>
    </div>

    </div>
</x-app-layout>
