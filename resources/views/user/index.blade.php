<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between item-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('users') }}
            </h2>
            <div class="flex">
                <a class="btn-submit mr-4" href="{{route('role.index')}}">Role</a>
                <a class="btn-submit" href="{{route('user.create')}}">Add new user</a>
            </div>

        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:user-index />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
