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
                </div>
            </div>
        </div>
    </div>
</div>
