<x-app-layout>
    <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('Manage User Dokter') }}
        </h2>
    </x-slot>

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto sm:tw-px-6 lg:tw-px-8">
            <div class="tw-bg-white tw-overflow-hidden tw-shadow-sm sm:tw-rounded-lg">
                <div class="tw-p-6 tw-text-gray-900">
                    <x-table :headers="['No', 'Nama', 'Email']">
                        @foreach ($dokter as $i => $d)
                            <tr>
                                <td class="">{{ $i + 1 }}</td>
                                <td class="">{{ $d->name }}</td>
                                <td class="">{{ $d->email }}</td>
                            </tr>
                            Dia {{ $d->name }} <br />
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
