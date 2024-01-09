<label for="type_id" class="w-100">
    <select wire:model="type_id" class="form-select form-select-sm w-100 filter-select" id="type_id" name="type_id">
        <option value="">{{ \App\Models\Widget\TextName::getTextTranslation('all') }}</option>
        @foreach($types as $type)
            <option value="{{ $type->id }}">{{ $type->translations[0]->name }}</option>
        @endforeach
    </select>
</label>
