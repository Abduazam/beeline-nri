<div>
    @if(!is_null($))
        <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modal-choose-controller{{ $diapason_id }}"><u>{{ $controller_name }}</u></button>
    @else
        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal" data-bs-target="#modal-choose-controller{{ $diapason_id }}">Выбрать контроллер</button>
    @endif
</div>
