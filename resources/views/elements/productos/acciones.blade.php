<button wire:click="$emit('edit',{{ $row->id }})" type="button" class="btn btn-success my-0"
    @if (get_class($row->ubicacion) != App\Models\InvBodega::class) disabled @endif>
    <i class="material-icons">edit</i>
</button>

<a href="{{ route('inv.productos.historial', $row->id) }}" type="button" class="btn btn-warning my-0">
    <i class="material-icons">history</i>
</a>
<button wire:click="$emit('deleteMsg',{{ $row->id }})" type="button" class="btn btn-danger my-0">
    <i class="material-icons">delete</i>
</button>

