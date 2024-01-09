<button wire:target="{{ $target }}"
        wire:loading.attr="disabled"
        wire:click="setAction('archive')"
        type="submit"
        class="btn btn-success border-0 px-4 ms-2">
    <small>{{ $text }}</small>
</button>
