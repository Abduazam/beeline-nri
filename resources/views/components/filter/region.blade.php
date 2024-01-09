<label for="region_id" class="w-100">
    <select wire:model="region_id" class="form-select form-select-sm w-100 filter-select" id="region_id" name="region_id" @if(empty($regions)) disabled @endif>
        <option value="">{{ \App\Models\Widget\TextName::getTextTranslation('all') }}</option>
        @foreach($regions as $region)
            <option value="{{ $region->id }}">{{ $region->translations[0]->name }}</option>
        @endforeach
    </select>
</label>
