<div>
    <div class="row">
        <div class="col-12 col-lg-12 mx-auto my-5">
            <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-uppercase ps-3">Acta de Devolucion de articulos del empleado</h6>
                    </div>
                </div>
                <div class="card-body">
                    <x-inventario.acta-entrega.progress-bar :stepsCompletes='2' :items="$items" />
                    <div class="bg-light my-3">
                        <div class="row">
                            <div class="col-md-5 p-0">
                                <div class="card card-frame m-3">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">N° de Acta</label>
                                                    <input value="{{ $model->id }}" class="form-control"
                                                        type="text" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Empleado Quien Entrega</label>
                                                    <select value="{{ $model->quien_entrega }}" class="form-control"
                                                        disabled>
                                                        <option value="">--- Seleccióne ---</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}"
                                                                @if ($model->quien_entrega == $user->id) selected @endif>
                                                                {{ $user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.quien_entrega')
                                                        <div class="form-text text-danger text-xs">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Bodega a la que Entrega</label>
                                                    <select wire:model.defer="model.bodega_id_entrega"
                                                        class="form-control">
                                                        <option value="">---Seleccionar---</option>
                                                        @foreach ($bodegas as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('model.bodega_id_entrega')
                                                        <div class="form-text text-danger text-xs">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Fecha de Entrega</label>
                                                    <input wire:model.defer="model.fecha_entrega" class="form-control"
                                                        type="date">
                                                    @error('model.fecha_entrega')
                                                        <div class="form-text text-danger text-xs">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Area</label>
                                                    <input wire:model.defer="model.area" class="form-control"
                                                        type="text">
                                                    @error('model.area')
                                                        <div class="form-text text-danger text-xs">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Centro Operativo</label>
                                                    <input wire:model.defer="model.centro_operativo"
                                                        class="form-control" type="text">
                                                    @error('model.centro_operativo')
                                                        <div class="form-text text-danger text-xs">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Ubicación</label>
                                                    <input wire:model.defer="model.ubicacion" class="form-control"
                                                        type="text">
                                                    @error('model.ubicacion')
                                                        <div class="form-text text-danger text-xs">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-floating">
                                                <textarea wire:model.defer="model.descripcion" class="form-control" style="height: 100px"></textarea>
                                                <label>Observación</label>
                                            </div>
                                            @error('model.descripcion')
                                                <div class="form-text text-danger text-xs">{{ $message }}</div>
                                            @enderror

                                        </div>
                                        {{-- <div class="row">
                                                <div>
                                                    <b>N° Acta de Entrega:</b> {{ $model->id }}
                                                </div>
                                                <div><b>Responsable:</b> {{ $model->createdBy->name }}</div>
                                                <div><b>Fecha de Entrega:</b> {{ $model->fecha_entrega }}</div>
                                                <b>Descripción:</b>
                                                <p>{{ $model->descripcion }}</p>
                                            </div> --}}
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-7 mt-3 px-3 p-0">
                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table align-items-center ">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Nombre</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Identificación</th>

                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Marca</th>
                                                    <th class="text-secondary opacity-7"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($model->detalle as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-xs">{{ $item->nombre }}
                                                                    </h6>
                                                                    <p class="text-xs text-secondary mb-0">
                                                                        Ubicacion</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">Cod. Inteno:
                                                                {{ $item->codigo_interno }}
                                                            </p>
                                                            <p class="text-xs text-secondary mb-0">Serial:
                                                                {{ $item->serial }}</p>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <span
                                                                class="text-secondary text-xs font-weight-normal">{{ $item->marca->nombre }}</span>
                                                        </td>
                                                        <td class="align-middle">
                                                            <button
                                                                wire:click="$emit('deleteDetalle',{{ $item->id }})"
                                                                type="button" class="btn btn-danger my-0">
                                                                <i class="material-icons">delete</i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    @livewire('inventario.inv-productos.search-dropdown')
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <div class="p-2">
                            <button wire:click="$emit('finalizar')" class="btn bg-gradient-primary">APLICAR AL
                                INVENTARIO</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
