<div>
    <ul id="progressbar" class="px-0">
        <li style="width: {{ $width }}%;" @if ($stepsCompletes >= 1) class="active" @endif id="account">
            <strong>Crear Acta Entrega</strong>
        </li>
        <li style="width: {{ $width }}%;" @if ($stepsCompletes >= 2) class="active" @endif id="personal">
            <strong>Articulos</strong>
        </li>
        <li style="width: {{ $width }}%;" @if ($stepsCompletes >= 3) class="active" @endif id="personal">
            <strong>Revisión Final</strong>
        </li>
    </ul>
    <div class="progress">
        <div style="width: {{ $width * $stepsCompletes }}%"
            class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0"
            aria-valuemax="100"></div>
    </div>

</div>
@push('css')
    <link href="{{ asset('assets/css/progressbar.css') }}" rel="stylesheet" />
@endpush
@push('js')
    <script src="{{ asset('assets/js/progressbar.js') }}"></script>
@endpush
