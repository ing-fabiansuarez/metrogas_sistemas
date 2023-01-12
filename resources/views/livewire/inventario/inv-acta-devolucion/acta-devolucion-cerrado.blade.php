<div>
    <div class="row">
        <div class="col-12 col-lg-12 mx-auto my-5">
            <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="text-white text-uppercase ps-3">Acta de Devolución de articulos del empleado</h6>
                            <a target="_blank" href="{{ route('pdf.acta-devolucion', $model) }}"
                                class="btn bg-primaryy mx-3">Imprimir</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="bg-light my-3">
                        <div class="row">
                            <div class="col-md-5 p-0">
                                <div class="card card-frame m-3">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">N° de Acta</label>
                                                    <input value="{{ $model->id }}" class="form-control"
                                                        type="text" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label class="form-label">Empleado Quien entrega</label>
                                                    <input value="{{ $model->quienEntrega->name }}" class="form-control"
                                                        type="text" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Bodega a la que Entrega</label>
                                                    <input value="{{ $model->bodegaEntrega->nombre }}"
                                                        class="form-control" type="text" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Fecha de Entrega</label>
                                                    <input value="{{ $model->fecha_entrega }}" class="form-control"
                                                        type="date" disabled>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Area</label>
                                                    <input value="{{ $model->area }}" class="form-control"
                                                        type="text" disabled>
                                                    @error('model.area')
                                                        <div class="form-text text-danger text-xs">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Centro Operativo</label>
                                                    <input value="{{ $model->centro_operativo }}" class="form-control"
                                                        type="text" disabled>
                                                    @error('model.centro_operativo')
                                                        <div class="form-text text-danger text-xs">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Ubicación</label>
                                                    <input value="{{ $model->ubicacion }}" class="form-control"
                                                        type="text" disabled>
                                                    @error('model.ubicacion')
                                                        <div class="form-text text-danger text-xs">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-floating">
                                                <textarea class="form-control" style="height: 100px" disabled>{{ $model->descripcion }}</textarea>
                                                <label>Observación</label>
                                            </div>
                                        </div>

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
                                                    {{-- <th class="text-secondary opacity-7"></th> --}}
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
                                                        {{-- <td class="align-middle">
                                                            <button
                                                                wire:click="$emit('deleteDetalle',{{ $item->id }})"
                                                                type="button" class="btn btn-danger my-0">
                                                                <i class="material-icons">delete</i>
                                                            </button>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
