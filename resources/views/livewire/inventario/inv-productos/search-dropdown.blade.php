<div>
    <div class="container-fluid px-0">
        <div class="page-header min-height-100 border-radius-xl">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body p-2 blur shadow-blur mx-2 mt-n7">
            <div class="row gx-4">
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Buscar Producto</label>
                        <input wire:model="searchTerm" class="form-control" type="text">
                    </div>
                    @foreach ($results as $item)
                        <div class="card card-frame mb-2 ">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Nombre:</b> {{ $item->nombre }}
                                        </div>
                                        <div class="col-md-12 text-xs"><b>Cod. Interno:</b>
                                            {{ $item->codigo_interno }}</div>
                                        <div class="col-md-12 text-xs">
                                            <b>Serial:</b> {{ $item->serial }}
                                        </div>
                                        <div class="col-md-12 text-xs">
                                            <b>Marca:</b> {{ $item->marca->nombre }}
                                        </div>
                                        <div class="col-md-12 text-xs">
                                            @switch(get_class($item->ubicacion))
                                                @case(App\Models\InvBodega::class)
                                                    <span
                                                        class="badge badge-pill badge-lg bg-gradient-success">DISPONIBLE</span>
                                                @break

                                                @case(App\Models\User::class)
                                                    <span class="badge badge-pill badge-lg bg-gradient-warning">OCUPADO</span>
                                                @break

                                                @default
                                                    <span class="badge badge-pill badge-lg bg-gradient-danger">NO ENCONTRO
                                                        DISPONIBILIDAD</span>
                                            @endswitch
                                        </div>


                                    </div>
                                    <button wire:click="$emit('beforeSelect',{{ $item->id }})" type="button"
                                        class="btn btn-success my-0">
                                        <i class="material-icons">add</i>
                                    </button>
                                </div>


                            </div>
                        </div>
                    @endforeach
                    @if ($msg)
                        <div class="card card-frame mb-2 ">
                            <div class="card-body p-2">
                                {{ $msg }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
