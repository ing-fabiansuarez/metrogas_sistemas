<a href="{{ route('inv.actas-devolucion.show', $row) }}" type="button" class="btn btn-success my-0">
    <i class="material-icons">edit</i>
</a>
<a target="_blank" href="{{ route('pdf.acta-devolucion', $row) }}" type="button" class="btn btn-warning my-0">
    <i class="material-icons">print</i>
</a>
@switch($row->estado)
    @case($EStateActaDevolucion::CREADO->getId())
        <button wire:click="$emit('deleteMsg',{{ $row->id }})" type="button" class="btn btn-danger my-0">
            <i class="material-icons">delete</i>
        </button>
    @break
@endswitch
