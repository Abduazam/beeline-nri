<div class="block-content block-content-full block-content-sm d-flex justify-content-between border-top">
    <x-modal.buttons.cancel />
    <x-dynamic-component :component="'modal.buttons.' . $button" :disabled="$disabled" />
</div>
