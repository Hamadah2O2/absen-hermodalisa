<x-app-layout>
    <x-slot name="header">
        <!--<div class="d-flex justify-content-around">-->
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('Absensi') }}
        </h2>
        <!--<div class="tw-ms-auto d-inline-block">-->
        <!--    <a href="{{ route('tambah.dokter') }}"class="btn btn-success">Tambah</a>-->
        <!--</div>-->
        <!--</div>-->
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
                                <th>Tanggal abesn</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absen as $i => $a)
                                <tr>
                                    <td class="">{{ $i + 1 }}</td>
                                    <td class="">{{ $a->tanggal_absen }}</td>
                                    <td class="">
                                        <a href="{{ route('absen.update', $a->id) }}" class="btn btn-warning">
                                            {{ $a->status }}
                                        </a>
                                    </td>
                                    <!--<td class="d-flex gap-2 w-full">-->
                                    <!--    <a href="{{ route('edit.dokter', ['id' => $a->id]) }}"-->
                                    <!--        class="btn btn-primary">Edit</a>-->
                                    <!--    <form action="{{ route('destroy.dokter', $a->id) }}" method="post"-->
                                    <!--        accept-charset="utf-8">-->
                                    <!--        @csrf-->
                                    <!--        @method('DELETE')-->
                                    <!--        <button type="submit" class="btn btn-danger"-->
                                    <!--            onclick="return confirm('Apakah kamu yakin ingin menghapus {{ $a->name }}')">Hapus</button>-->
                                    <!--    </form>-->
                                    <!--</td>-->
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
