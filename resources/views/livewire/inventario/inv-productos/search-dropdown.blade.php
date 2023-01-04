<div>
    <div class="container-fluid">
        <div class="page-header min-height-100 border-radius-xl">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-12">

                    <div class="input-group input-group-lg input-group-outline my-3">
                        <label class="form-label">Buscar Producto</label>
                        <input wire:model="searchTerm" type="text" class="form-control form-control-lg">
                    </div>

                    @foreach ($results as $item)
                        <div class="card card-frame mb-2 ">
                            <div class="card-body p-3">
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
                                </div>

                            </div>
                        </div>
                    @endforeach
                    @if (count($results) == 0)
                        <div class="card card-frame mb-2 ">
                            <div class="card-body p-2">
                                No se encontraron resultados...
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
