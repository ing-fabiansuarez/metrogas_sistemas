<div>
    <div class="row">
        <div class="col-12 col-lg-8 mx-auto my-5">
            <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-uppercase ps-3">Acta de entrega de articulos al empleado</h6>
                    </div>
                </div>
                <div class="card-body">
                    <x-inventario.acta-entrega.progress-bar :stepsCompletes='1' :items="$items" />
                    <form wire:submit.prevent="save">
                        <div class="p-4 bg-light my-3">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Empleado Responsable</label>
                                        <select wire:model.defer="model.responsable" class="form-control">
                                            <option value="">--- Seleccióne ---</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('model.responsable')
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
                                            <div class="form-text text-danger text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Area</label>
                                        <input wire:model.defer="model.area" class="form-control" type="text">
                                        @error('model.area')
                                            <div class="form-text text-danger text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Centro Operativo</label>
                                        <input wire:model.defer="model.centro_operativo" class="form-control"
                                            type="text">
                                        @error('model.centro_operativo')
                                            <div class="form-text text-danger text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Ubicación</label>
                                        <input wire:model.defer="model.ubicacion" class="form-control" type="text">
                                        @error('model.ubicacion')
                                            <div class="form-text text-danger text-xs">{{ $message }}</div>
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
