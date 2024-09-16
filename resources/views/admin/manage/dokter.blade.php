<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-around">
            <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight">
                {{ __('Manage User Dokter') }}
            </h2>
            <div class="tw-ms-auto d-inline-block">
                <a href="{{ route('tambah.dokter') }}"class="btn btn-success">Tambah</a>
            </div>
        </div>
    </x-slot>

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto sm:tw-px-6 lg:tw-px-8">
            <div class="tw-bg-white tw-overflow-hidden tw-shadow-sm sm:tw-rounded-lg">
                <div class="tw-p-6 tw-text-gray-900">
                    @if (session('success'))
                        <div class="alert alert-success mb-3" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokter as $i => $d)
                                <tr>
                                    <td class="">{{ $i + 1 }}</td>
                                    <td class="">{{ $d->name }}</td>
                                    <td class="">{{ $d->email }}</td>
                                    <td class="">{{ $d->username }}</td>
                                    <td class="d-flex gap-2 w-full">
                                        <a href="{{ route('edit.dokter', ['id' => $d->id]) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ route('destroy.dokter', $d->id) }}" method="post"
                                            accept-charset="utf-8">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah kamu yakin ingin menghapus {{ $d->name }}')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
