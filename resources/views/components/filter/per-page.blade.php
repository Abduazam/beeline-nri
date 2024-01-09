<label for="perPage" class="w-100 p-0">
    <select wire:model="perPage" class="form-select form-select-sm w-100 filter-select" id="perPage" name="perPage">
        <option value="15">15</option>
        <option value="30">30</option>
        <option value="50">50</option>
        <option value="0">{{ \App\Models\Widget\TextName::getTextTranslation('all') }}</option>
    </select>
</label>
