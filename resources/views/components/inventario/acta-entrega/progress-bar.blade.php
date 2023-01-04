<div>
    <ul id="progressbar" class="px-0">
        @foreach ($items as $key => $item)
            <li style="width: {{ $width }}%;" @if ($stepsCompletes > $key) class="active" @endif
                id="{{ $item['id'] }}">
                <strong>{{ $item['nombre'] }}</strong>
            </li>
        @endforeach
    </ul>
    <div class="progress">
        <div style="width: {{ $width * $stepsCompletes }}%"
            class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0"
            aria-valuemax="100"></div>
    </div>

</div>
@push('css')
    <link href="{{ asset('assets/css/progressbar.css') }}" rel="stylesheet" />
    @foreach ($items as $item)
        <style>
            #progressbar #{{ $item['id'] }}:before {
                font-family: FontAwesome;
                content: "{{ $item['icon'] }}";
            }
        </style>
    @endforeach
@endpush
@push('js')
    <script src="{{ asset('assets/js/progressbar.js') }}"></script>
@endpush
