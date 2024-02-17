<div>
    <select name="country">
        @foreach ($countries as $prefix => $name)
            <option value="{{ $prefix }}">
                @include("flags." . $prefix) {{ $name }}
            </option>
        @endforeach
    </select>

</div>
