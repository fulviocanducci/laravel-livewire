<div>
    <form method="POST" wire:submit.prevent="save">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill"/>
                    </svg>
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="name_people" class="form-label">Nome</label>
            <input name="name" type="text" wire:model="name" class="form-control" id="name_people" maxlength="100" placeholder="Digite o nome">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-check mb-3">
            <input name="active" class="form-check-input" wire:model="active" type="checkbox" value="1" id="active_people">
            <label class="form-check-label" for="active_people">
                Ativo
            </label>
        </div>
        <button type="submit" class="btn btn-success btn-sm">Salvar</button> | <button type="button" class="btn btn-danger btn-sm" wire:click="goBack">Cancelar</button>
    </form>
</div>