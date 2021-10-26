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
            <li class="list-group-item">
                <input type="checkbox" value="1" wire:click="done({{$todo->id}})" @if ($todo->done) checked @endif id="check_{{$todo->id}}}"/>    
                <label style="text-decoration: {{$todo->done ? 'line-through':'none'}}" for="check_{{$todo->id}}}"> {{$todo->description}}</label>
            </li>
        @endforeach
        </ul>
    @endif
</div>
