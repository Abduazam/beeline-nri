<label for="role_id" class="w-100">
    <select wire:model="role_id" class="form-select form-select-sm w-100 filter-select" id="role_id" name="role_id">
        <option value="0">{{ \App\Models\Widget\TextName::getTextTranslation('all') }}</option>
        @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
</label>
