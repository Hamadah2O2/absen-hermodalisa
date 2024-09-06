<div class="tw-relative tw-overflow-x-auto">
    <table class="tw-w-full tw-text-sm tw-text-left rtl:tw-text-right tw-text-gray-500 dark:tw-text-gray-400">
        <thead class="tw-text-xs tw-text-gray-700 tw-uppercase tw-bg-gray-100">
            <tr>
                @foreach ($headers as $header)
                    <th scope="col" class="tw-px-6 tw-py-3">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>

