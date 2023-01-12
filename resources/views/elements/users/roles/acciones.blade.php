<button wire:click="$emit('edit',{{ $row->id }})" type="button" class="btn btn-success my-0">
    <i class="material-icons">build</i>
</button>
<button wire:click="$emit('deleteMsg',{{ $row->id }})" type="button" class="btn btn-danger my-0">
    <i class="material-icons">delete</i>
</button>
