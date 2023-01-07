<div>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h6><b>Historial Artículo:</b> {{ $model->nombre }}</h6>
                    <p class="text-sm">
                        <span class="font-weight-bold">Marca:</span> {{ $model->marca->nombre }}
                    </p>
                    <p class="text-sm">
                        <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                        <span class="font-weight-bold">{{ $model->historial->count() }}</span> Cambios
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="timeline timeline-one-side">

                        @foreach ($model->historial as $item)
                            <div class="timeline-block mb-3">
                                <span class="timeline-step">
                                    <i class="material-icons text-success text-gradient">{{ $item->icon }}</i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $item->descripcion }} </h6>
                                    <div class="text-xs">
                                        <b>Ubicación:</b>

                                        @switch(get_class($item->ubicacion))
                                            @case(App\Models\InvBodega::class)
                                                {{ $item->ubicacion->nombre }}
                                            @break

                                            @case(App\Models\User::class)
                                                {{ $item->ubicacion->name }}
                                            @break

                                            @default
                                                No encontrado
                                        @endswitch

                                    </div>
                                    {{--  <div class="text-xs">
                                        <b>Responsable:</b> {{ $item->userResponsable->name }}
                                    </div> --}}
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $item->created_at }}
                                    </p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
