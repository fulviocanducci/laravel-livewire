<div wire:init="init">   
    @if ($typeForm === 'crud')
        @include('livewire.people-crud')
    @endif
    @if ($typeForm === 'list')    
    <h5>Lista de Pessoas</h5>
    <hr class="mt-0 mb-2"/>
    <div class="mt-2 mb-3 text-center">
        <button type="button" wire:click="create" class="btn btn-primary btn-sm">Novo</button>
    </div>
    <div class="mt-2 mb-3">
        <input type="text" wire:model.debounce.500ms="filter" class="form-control form-control-sm">
    </div>
    <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th scope="col" class="col-md-2 text-center">Id</th>
                <th scope="col" class="col-md-6 text-center">Nome</th>
                <th scope="col" class="col-md-2 text-center">Ativo</th>
                <th scope="col" class="col-md-2 text-center">...</th>
            </tr>
        </thead>
        <tbody>            
            @if (is_null($peoples))
                <tr>
                    <td colspan="3" width="100%">
                        <div class="placeholder-glow text-center">
                            <span class="placeholder col-md-9"></span>
                            <span class="placeholder col-md-2"></span>                            
                        </div>
                    </td>                    
                    <td colspan="3" width="100%">
                        <div class="placeholder-glow text-center">                            
                            <span class="placeholder col-md-2"></span>
                            <span class="placeholder col-md-9"></span>                            
                        </div>
                    </td>  
                </tr>
            @else
                @foreach($peoples as $people)
                <tr>
                    <td class="text-center">{{$people->id}}</td>
                    <td class="text-start ">{{$people->name}}</td>
                    <td class="text-center">
                        <div wire:click="changeActive({{$people->id}})" style="cursor: pointer;">
                            <livewire:status-smile :status="$people->active" :wire:key="'status-people-'.(uniqid($people->id))">
                        </div>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm" wire:click="edit({{$people->id}})">Alterar</button> 
                    </td>
                </tr>
                @endforeach
            @endif           
        </tbody>
    </table>
    <div>
    @if (!is_null($peoples))
    <div class="position-relative">
        <div class="position-absolute top-0 start-50 translate-middle-x">                
            {{ $peoples->links() }}                
        </div>
    </div>
    @endif
    </div>
    @endif    
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('component.initialized', function(component) {})
        Livewire.hook('element.initialized', function(el, component) {})
        Livewire.hook('element.updating', function(fromEl, toEl, component) {})
        Livewire.hook('element.updated', function(el, component) { })
        Livewire.hook('element.removed', function(el, component) {})
        Livewire.hook('message.sent', function(message, component) {})
        Livewire.hook('message.failed', function(message, component) {})
        Livewire.hook('message.received', function(message, component) {})
        Livewire.hook('message.processed', function(message, component) {})
    });
</script>