<div>
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">category</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Articulos</p>
                            <h4 class="mb-0">{{ $totalArticulos }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    {{-- <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                            lask week</p>
                    </div> --}}
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Usuarios</p>
                            <h4 class="mb-0">{{ $totalUsers }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    {{-- <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than
                            lask month</p>
                    </div> --}}
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">view_in_ar</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Bodegas</p>
                            <h4 class="mb-0">{{ $totalBodegas }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    {{-- <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than
                            yesterday</p>
                    </div> --}}
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">apartment</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Marcas</p>
                            <h4 class="mb-0">{{ $totalMarcas }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    {{-- <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than
                            yesterday</p>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-7 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Actas de Entrega</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route('inv.actas-entrega') }}"
                                    class="btn btn-outline-primary btn-sm mb-0">Ver Todo</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-0">
                        <ul class="list-group">
                            @foreach ($listActaEntregas as $actaEntrega)
                                <li
                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                            {{ $actaEntrega->created_at }}</h6>
                                        <span class="text-xs"><b>Responsable:</b>
                                            {{ $actaEntrega->userResponsable->name }}</span>
                                        <span class="text-xs"><b>Creada Por:</b>
                                            {{ $actaEntrega->createdBy->name }}</span>
                                    </div>
                                    <div class="d-flex align-items-center text-sm">
                                        <a target="_blank" href="{{ route('pdf.acta-entrega', $actaEntrega->id) }}"
                                            class="btn btn-link text-dark text-sm mb-0 px-0 ms-4">
                                            N° Acta {{$actaEntrega->id}} <i
                                                class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                                            PDF</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Actas de devolución</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route('inv.acta-devolucion') }}"
                                    class="btn btn-outline-primary btn-sm mb-0">Ver Todo</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-0">
                        <ul class="list-group">
                            @foreach ($listActaDevoluciones as $acta)
                                <li
                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                            {{ $acta->created_at }}</h6>
                                        <span class="text-xs"><b>Quien entrega:</b>
                                            {{ $acta->quienEntrega->name }}</span>
                                        <span class="text-xs"><b>Bodega de entrega:</b>
                                            {{ $acta->bodegaEntrega->nombre }}</span>
                                        <span class="text-xs"><b>Creada Por:</b>
                                            {{ $actaEntrega->createdBy->name }}</span>
                                    </div>
                                    <div class="d-flex align-items-center text-sm">
                                        <a target="_blank" href="{{ route('pdf.acta-devolucion', $acta->id) }}"
                                            class="btn btn-link text-dark text-sm mb-0 px-0 ms-4">
                                            N° Acta {{ $acta->id }}<i
                                                class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                                            PDF</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
