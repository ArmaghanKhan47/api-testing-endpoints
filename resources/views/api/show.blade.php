<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('APIs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    API Details
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 grid-rows-1">
                        <span>API Name</span>
                        <span>{{ $api->name }}</span>
                    </div>

                    <div class="grid grid-cols-2 grid-rows-1">
                        <span>API Route</span>
                        <span>/api/{{Auth::user()->username}}/{{ $api->slug }}</span>
                    </div>

                    <div class="grid grid-cols-2 grid-rows-1">
                        <span class="col-span-1">API Method</span>
                        <span class="text-green-700 font-bold col-span-1">{{ $api->method }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
