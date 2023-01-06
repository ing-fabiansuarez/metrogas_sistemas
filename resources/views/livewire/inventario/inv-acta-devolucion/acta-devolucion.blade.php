<div class="">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-uppercase ps-3">{{ $TITLE_TABLE }}</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2 mx-4">
                        <livewire:inventario.inv-acta-devolucion.acta-devolucion-table theme="bootstrap-5" />
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('js')
    
    <script>
        window.addEventListener('close-modal', event => {
            $('#modalModelo').modal('hide');
            $('.modal-backdrop').remove();
        });
        window.addEventListener('open-modal', event => {
            $('#modalModelo').modal('show');
        });
        Livewire.on('message', function(title, message) {
            Swal.fire(
                title,
                message,
                'success'
            )
        });
        Livewire.on('deleteMsg', objId => {
            Swal.fire({
                title: '¿Está Seguro?',
                text: 'Se eliminara el registro seleccionado.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si estoy seguro',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('delete', objId);
                    Swal.fire(
                        '{{ __('forms.deleted') }}',
                        '{{ __('forms.message.delete') }}',
                        'success'
                    )
                }
            })
        });
    </script>
@endpush