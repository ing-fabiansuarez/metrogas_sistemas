<div class="">
    <!-- Navbar -->
    <!-- End Navbar -->
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
                        <livewire:inventario.inv-marcas.marcas-table theme="bootstrap-5" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalModelo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">{{ $TITLE_TABLE }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group input-group-outline">
                        <label class="form-label">Nombre</label>
                        <input wire:model="model.nombre" type="text" class="form-control">
                    </div>
                    @error('model.nombre')
                        <span class="text-danger text-message-validation">
                            {{ $message }}
                        </span>
                    @enderror

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button wire:click="$emit('save')" type="button" class="btn bg-gradient-primary">Guardar
                        Cambios</button>
                </div>
            </div>
        </div>
    </div>

</div>
@push('js')
    {{-- mesajes --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
