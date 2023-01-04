<div>
    <div class="row">
        <div class="col-12 col-lg-12 mx-auto my-5">
            <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-uppercase ps-3">Acta de entrega de articulos al empleado</h6>
                    </div>
                </div>
                <div class="card-body">
                    <x-inventario.acta-entrega.progress-bar :stepsCompletes='2' :items="$items" />
                    <form wire:submit.prevent="save">

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
                                                        <label class="form-label">Empleado Responsable</label>
                                                        <select wire:model.defer="model.responsable"
                                                            class="form-control">
                                                            <option value="">--- Seleccióne ---</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}">{{ $user->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('model.responsable')
                                                            <div class="form-text text-danger text-xs">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Fecha de Entrega</label>
                                                        <input wire:model.defer="model.fecha_entrega"
                                                            class="form-control" type="date">
                                                        @error('model.fecha_entrega')
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
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-xs">Nombre Producto</h6>
                                                                    <p class="text-xs text-secondary mb-0">
                                                                        Ubicacion</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">Codigo Interno</p>
                                                            <p class="text-xs text-secondary mb-0">Serial</p>
                                                        </td>

                                                        <td class="align-middle text-center">
                                                            <span
                                                                class="text-secondary text-xs font-weight-normal">Marca</span>
                                                        </td>
                                                        <td class="align-middle">
                                                            <button type="button" class="btn btn-danger my-0">
                                                                <i class="material-icons">delete</i>
                                                            </button>
                                                        </td>
                                                    </tr>
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
                                <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
