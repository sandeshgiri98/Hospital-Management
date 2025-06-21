<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User: ') . $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required autocomplete="username" />
                        <x-input-error for="email" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-label for="roles" value="{{ __('Assign Roles') }}" />
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-2">
                            @foreach($roles as $role)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                           {{ $user->hasRole($role->name) ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                                    <span class="ms-2 text-sm text-gray-600">{{ ucfirst($role->name) }}</span>
                                </label>
                            @endforeach
                        </div>
                        <x-input-error for="roles" class="mt-2" />
                        <x-input-error for="roles.*" class="mt-2" /> {{-- For individual role validation errors --}}
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ms-4">
                            {{ __('Update User') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>