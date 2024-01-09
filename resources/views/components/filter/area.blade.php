<label for="area_id" class="w-100">
    <select wire:model="area_id" class="form-select form-select-sm w-100 filter-select" id="area_id" name="area_id" @if(empty($areas)) disabled @endif>
        <option value="">{{ $default }}</option>
        @foreach($areas as $area)
            <option value="{{ $area->id }}">{{ $area->translations[0]->name }}</option>
        @endforeach
    </select>
</label>
