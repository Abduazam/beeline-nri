<button wire:target="send"
        wire:loading.attr="disabled"
        type="submit"
        class="btn btn-sm btn-primary text-white"
        data-bs-dismiss="modal"
        @if($disabled) disabled @endif>
    {{ $text }}
</button>
