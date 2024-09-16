<x-app-layout>
    <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('Tambah User Dokter') }}
        </h2>
    </x-slot>

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto sm:tw-px-6 lg:tw-px-8">
            <div class="tw-bg-white tw-overflow-hidden tw-shadow-sm sm:tw-rounded-lg">
                <div class="tw-p-6 tw-text-gray-900">
                    <form action="{{ route('user.dokter') }}" method="post" accept-charset="utf-8">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="tw-block tw-mt-1 tw-w-full" type="text"
                                name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="tw-mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="tw-mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="tw-block tw-mt-1 tw-w-full" type="email"
                                name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="tw-mt-2" />
                        </div>

                        <!-- Username -->
                        <div class="tw-mt-4">
                            <x-input-label for="username" :value="__('Username')" />
                            <x-text-input id="username" class="tw-block tw-mt-1 tw-w-full" type="text"
                                name="username" :value="old('username')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('username')" class="tw-mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="tw-mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="tw-block tw-mt-1 tw-w-full" type="password"
                                name="password" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="tw-mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="tw-mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="tw-block tw-mt-1 tw-w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="tw-mt-2" />
                        </div>

                        <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
                            <button class="ms-4 btn btn-success">
                                {{ __('Tambah') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
