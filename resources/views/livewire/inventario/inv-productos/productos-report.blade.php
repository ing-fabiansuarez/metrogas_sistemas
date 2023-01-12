<div>
    <div class="card mt-4">
        <div class="card-header p-3">
            <h5 class="mb-0">Reportes en Excel del Stock</h5>
            @include('elements.loader')
        </div>
        <div class="card-body p-3">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-12 mb-3">
                    <button wire:click="exportDisponibles" class="btn bg-gradient-success w-100 mb-0 toast-btn"
                        type="button">Disponibles</button>
                </div>
                <div class="col-lg-4 col-sm-6 col-12 mt-lg-0 mt-2 mb-3">
                    <button wire:click="exportOcupados" class="btn bg-gradient-warning w-100 mb-0 toast-btn"
                        type="button">Ocupados</button>
                </div>
                {{--  <div class="col-lg-3 col-sm-6 col-12 mt-sm-0 mt-2 mb-3">
                    <button class="btn bg-gradient-info w-100 mb-0 toast-btn" type="button">Historial</button>
                </div> --}}
                <div class="col-lg-4 col-sm-6 col-12 mt-lg-0 mt-2 mb-3">
                    <button wire:click="exportTodo" class="btn bg-gradient-danger w-100 mb-0 toast-btn"
                        type="button">Descargar Todo</button>
                </div>
                {{-- <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2 mb-3">
                    <button class="btn bg-gradient-primary w-100 mb-0 toast-btn" type="button">Historial
                        Articulo</button>
                </div> --}}
            </div>
        </div>
    </div>

</div>
