<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('QR Guest') }} - {{ $guest->name }}
            </h2>
        </div>
    </x-slot>

    <style>
        .centered svg {
            position: relative;
            left: 50%;
            margin-left: -150px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <br><br>
                <img src="{{ asset('assets/img/header.jpg') }}" alt="Logo" class="w-full mb-6">
                <h1 class="text-2xl font-bold mb-4 text-center">{{ __('QR Guest') }} - {{ $guest->name }}</h1>
                <div class="centered">
                    {!! QrCode::size(300)->generate(route('guests.scan', $guest)) !!}
                </div>
                <br><br>
            </div>
        </div>
    </div>
</x-app-layout>
