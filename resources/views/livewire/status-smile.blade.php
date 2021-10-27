<div>        
    @if ($status)
        <button type="button" class="btn btn-sm btn-success">
            <i class="bi bi-emoji-smile text-white" title="Ativo"></i>
        </button>
    @else
        <button type="button" class="btn btn-sm btn-danger">
            <i class="bi bi-emoji-frown text-white" title="Inativo"></i>
        </button>
    @endif
</div>