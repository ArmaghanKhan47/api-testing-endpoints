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
                    Create Your API
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('api.store') }}">
                        @csrf
                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('API Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>
                        <!-- Slug -->
                        <div>
                            <x-label for="name" :value="__('API Slug')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required />
                        </div>
                        <!-- Method -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('API Method')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="method" value="GET" required disabled />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Create API') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Your APIs
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($user->apis as $api)
                    <div class="flex justify-between items-center">
                        <span class="text-green-700 font-bold mx-5">{{ $api->method }}</span>
                        <span class="mx-5">{{ $api->name }}</span>
                        <span class="mx-5">/api/{{$user->username}}/{{ $api->slug }}/</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
