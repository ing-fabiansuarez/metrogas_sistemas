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
                        <livewire:inventario.inv-productos.productos-table theme="bootstrap-5" />

                    </div>
                    <div class="card-body px-0 pb-2 mx-4">
                        <livewire:inventario.inv-productos.productos-report />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="modalModelo">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">{{ $TITLE_TABLE }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group input-group-outline">
                                    <label class="form-label">Nombre</label>
                                    <input wire:model.defer="model.nombre" type="text" class="form-control">
                                </div>
                                @error('model.nombre')
                                    <span class="text-danger text-message-validation">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <div class="form-group input-group-outline">
                                    <label>Codigo interno</label>
                                    <input wire:model.defer="model.codigo_interno" type="text" class="form-control">
                                </div>
                                @error('model.codigo_interno')
                                    <span class="text-danger text-message-validation">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <div class="form-group input-group-outline">
                                    <label class="form-label">Serial</label>
                                    <input wire:model.defer="model.serial" type="text" class="form-control">
                                </div>
                                @error('model.serial')
                                    <span class="text-danger text-message-validation">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <div class="form-group input-group-outline">
                                    <label class="form-label">Marca</label>
                                    <select wire:model.defer="model.marca_id" type="text" class="form-control">
                                        <option value="">---Seleccionar---</option>
                                        @foreach ($marcas as $marca)
                                            <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('model.marca_id')
                                    <span class="text-danger text-message-validation">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <div class="form-group input-group-outline">
                                    <label class="form-label">Bodega</label>
                                    <select wire:model.defer="idBodega" type="text" class="form-control">
                                        <option value="">---Seleccionar---</option>
                                        @foreach ($bodegas as $item)
                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('idBodega')
                                    <span class="text-danger text-message-validation">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group input-group-outline">
                                    <label class="form-label">Caracteristicas</label>
                                    <div class="row">
                                        <div class="col">
                                            <input wire:model.defer="newCaracteristica.nombre" type="text"
                                                class="form-control" placeholder="Nombre">
                                            @error('newCaracteristica.nombre')
                                                <span class="text-danger text-message-validation">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input wire:model.defer="newCaracteristica.valor" type="text"
                                                class="form-control" placeholder="Valor">
                                            @error('newCaracteristica.valor')
                                                <span class="text-danger text-message-validation">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col justify-content-center">
                                            <button wire:click="addCaracteristica"
                                                class="w-50 btn btn-icon btn-2 bg-primaryy my-2" type="button">
                                                <span class="btn-inner--icon"><i class="material-icons">add</i></span>
                                            </button>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-sm">
                                                @foreach ($arrayCarac as $key => $item)
                                                    <tr>
                                                        <td>
                                                            {{ $item['nombre'] }}
                                                        </td>
                                                        <td>
                                                            {{ $item['valor'] }}
                                                        </td>
                                                        <td>
                                                            <button
                                                                wire:click="deleteCaracteristica({{ $key }})"
                                                                type="button" class="btn btn-danger my-0">
                                                                <i class="material-icons">delete</i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
