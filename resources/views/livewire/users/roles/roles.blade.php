<div>
    <x-cards.card-principal>
        <x-slot:title>
            {{ $TITLE_TABLE }}
        </x-slot:title>
        <livewire:users.roles.roles-table theme="bootstrap-5" />
    </x-cards.card-principal>
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
                        <input wire:model="model.descripcion" type="text" class="form-control">
                    </div>
                    @error('model.descripcion')
                        <span class="text-danger text-message-validation">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="form-group input-group-outline">
                        <label class="form-label">Permisos del Rol</label>
                        @foreach ($allPermissions as $item)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input wire:model.defer="permissions" value="{{ $item->name }}" type="checkbox">
                                    {{ $item->descripcion }}
                                </label>
                            </div>
                        @endforeach
                    </div>

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
        window.addEventListener('eliminado', event => {
            Swal.fire(
                '{{ __('forms.deleted') }}',
                '{{ __('forms.message.delete') }}',
                'success'
            )
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

                }
            })
        });
    </script>
@endpush
