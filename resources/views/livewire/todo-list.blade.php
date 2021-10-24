<div wire:init="loadTodos">
    <form method="post" wire:submit.prevent="create">
        <div class="input-group mb-3">
        <input type="text" wire:model="description" class="form-control form-control-sm" placeholder="Digite a tarefa" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary btn-sm" type="submit" id="button-addon2">
            <i class="bi bi-clipboard-plus"></i> Adicionar
            </button>
        </div>
        @error('description')<div class="alert alert-danger">{{ $message }}</div>@enderror
    </form>    
    <div>
        <livewire:show-todos :todos="$todos" key="{{ Str::random() }}"/>
    </div>    
</div>
