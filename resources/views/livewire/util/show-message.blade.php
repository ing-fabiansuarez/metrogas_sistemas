@push('js')
    {{-- mesajes --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('mensaje', event => {
            switch (event.detail.tipo) {
                case 1:
                    Swal.fire({
                        icon: 'error',
                        title: event.detail.titulo,
                        text: event.detail.cuerpo,
                    })
                    break;
                default:
                    break;

            }
        });
    </script>
@endpush
