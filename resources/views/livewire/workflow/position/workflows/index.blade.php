<div class="content">
    <div class="block block-rounded">
        <div class="block-content">
            <div class="filter-table pb-4">
                <div class="row w-100 h-100 m-0 p-0">
                    <div class="col-sm-4 p-0">
                        <x-filter.search />
                    </div>
                    <div class="col-sm-3">
                        <div class="row w-100 h-100 p-0 m-0">
                            <div class="col-6 ps-0 pe-2">
                                <x-filter.status />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 d-flex align-items-center justify-content-end pe-0">
                        @can('create position workflow')
                            <livewire:workflow.position.workflows.create />
                        @endcan
                    </div>
                </div>
            </div>
            <div class="table-block pb-4">
                <table class="own-table w-100">
                    <thead class="row w-100 h-100 p-0 m-0">
                        <tr class="row bg-gray-light w-100 h-100 px-0 m-0">
                            <th class="col-1 text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_workflows', 'id') }}</th>
                            <th class="col-5">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_workflows', 'title') }}</th>
                            <th class="col-3 text-center">{{ \App\Models\Widget\TableColumnName::getColumnTranslation('position_workflows', 'created_at') }}</th>
                            <th class="col-3 text-center">{{ \App\Models\Widget\TextName::getTextTranslation('actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="row w-100 h-100 p-0 m-0">
                        @foreach($steps as $step)
                            <tr class="row bg-light w-100 h-100 px-0 m-0 @if(!$loop->last){{ 'border-bottom-radius-none' }}@else @if(count($step->users) > 0){{ 'border-bottom-radius-none' }}@endif @endif ">
                                <td class="col-1 d-flex justify-content-center align-items-center">{{ $loop->index + 1 }}</td>
                                <td class="col-5 d-flex align-items-center">{{ $step->title }}</td>
                                <td class="col-3 d-flex justify-content-center align-items-center">{{ $step->created_at }}</td>
                                <td class="col-3 d-flex justify-content-center align-items-center">
                                    @if($this->is_archived == 1)
                                        @can('restore position workflow')
                                            <livewire:workflow.position.workflows.restore :workflow="$step" :wire:key="'restore-position-workflow-' . $step->id" />
                                        @endcan
                                    @else
                                        @can('create position workflow user')
                                            <livewire:workflow.position.workflow-users.add :workflow="$step" :wire:key="'add-user-position-workflow-' . $step->id"  />
                                        @endcan
                                        @can('edit position workflow')
                                            <livewire:workflow.position.workflows.edit :workflow="$step" :wire:key="'edit-position-workflow-' . $step->id" />
                                        @endcan
                                    @endif
                                    @canany(['delete position workflow', 'force delete position workflow'])
                                        <livewire:workflow.position.workflows.delete :workflow="$step" :wire:key="'delete-position-workflow-' . $step->id" />
                                    @endcanany
                                </td>
                            </tr>
                            <livewire:workflow.position.workflows.users :workflow="$step" :wire:key="'users-position-workflow-' . $step->id" />
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

