<div>
    <x-cards.card-principal>
        <x-slot:title>
            {{ $model->name }}
        </x-slot:title>
        <div class="card">
            <div class="card-header pb-0 px-3">
                <div class="d-flex flex-row ">
                    <h6 style="padding-right: 50px" class="mb-0">Roles Usuario</h6>
                </div>

            </div>

            <div class="card-body pt-4 p-3">
                <form wire:submit.prevent="save" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            @foreach ($roles as $rol)
                                <div class="form-check">
                                    <input type="checkbox" wire:model="rolesSelected" value="{{ $rol->name }}">
                                    <label class="form-check-label">
                                        {{ $rol->descripcion }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">Guardar Cambios</button>
                    </div>
                </form>

            </div>
        </div>
    </x-cards.card-principal>
</div>
