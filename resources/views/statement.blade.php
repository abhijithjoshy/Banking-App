@extends('master')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Statement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Datetime</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Details</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statements as $statement)
                        <tr>
                            <td>{{ $statement->created_at }}</td>
                            <td>{{ $statement->amount }}</td>
                            <td>{{ $statement->type }}</td>
                            <td>{{ $statement->details }}</td>
                            <td>{{ $statement->balance }} INR</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
