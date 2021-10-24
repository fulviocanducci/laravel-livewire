<div>
    @if (is_null($todos))
    <livewire:loading />   
    @else   
        @if (count($todos) === 0)
            <h6>Nenhuma tarefa cadastrada ...</h6>
        @endif 
        <p class="font-weight-lighter text-start ms-1 mt-0 mb-2">
            <small>Quantidade: {{count($todos)}}</small>
        </p>
        <ul class="list-group">
        @foreach($todos as $todo)
            <li class="list-group-item">{{$todo->description}}</li>
        @endforeach
        </ul>
    @endif
</div>
