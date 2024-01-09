<label for="branch_id" class="w-100">
    <select wire:model="branch_id" class="form-select form-select-sm w-100 filter-select" id="branch_id" name="branch_id">
        <option value="">{{ \App\Models\Widget\TextName::getTextTranslation('all') }}</option>
        @foreach($branches as $branch)
            <option value="{{ $branch->id }}">{{ $branch->translations[0]->name }}</option>
        @endforeach
    </select>
</label>
