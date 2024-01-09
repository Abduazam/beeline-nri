<button wire:target="add"
        wire:loading.attr="disabled"
        type="submit"
        class="btn btn-sm btn-success"
        data-bs-dismiss="modal"
        @if($disabled) disabled @endif>
    {{ $text }}
</button>
