<label for="search" class="w-100 ps-0">
    <input wire:model.debounce.100ms="search" type="text" class="form-control form-control-sm w-100" id="search" name="search" placeholder="{{ \App\Models\Widget\TextName::getTextTranslation('search') }}" >
</label>
