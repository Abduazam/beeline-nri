<label for="is_archived" class="w-100">
    <select wire:model="is_archived" class="form-select form-select-sm w-100 filter-select" id="is_archived" name="is_archived">
        <option value="0">{{ \App\Models\Widget\TextName::getTextTranslation('actives') }}</option>
        <option value="1">{{ \App\Models\Widget\TextName::getTextTranslation('inactives') }}</option>
    </select>
</label>
