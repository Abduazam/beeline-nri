<button wire:target="delete"
        wire:loading.attr="disabled"
        type="submit"
        class="btn btn-sm btn-danger"
        data-bs-dismiss="modal"
        @if($disabled) disabled @endif>
    {{ $text }}
</button>
