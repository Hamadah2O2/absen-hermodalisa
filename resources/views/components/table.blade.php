<table class="table {{ $class = '' }}">
    <thead>
        <tr class="{{ $headerClass | '' }}">
            @foreach ($headers as $header)
                <th scope="col">
                    {{ $header }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
