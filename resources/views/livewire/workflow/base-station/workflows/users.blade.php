<tbody class="row w-100 h-100 p-0 m-0">
@foreach($users as $user)
    <tr class="row w-100 h-100 px-0 m-0 border-bottom-radius-none">
        <td class="col-1 d-flex justify-content-center align-items-center">{!! $user->getStatus() !!}</td>
        <td class="col-1 d-flex justify-content-center align-items-center">{!! $user->user->getImage() !!}</td>
        <td class="col-3 d-flex align-items-center">{{ $user->user->name }}</td>
        <td class="col-3 d-flex align-items-center">{{ $user->user->email }}</td>
        <td class="col-2 d-flex justify-content-center align-items-center">{{ $user->created_at }}</td>
        <td class="col-2 d-flex justify-content-center align-items-center">
            @if($user->trashed())
                @can('restore base-station workflow user')
                    <livewire:workflow.base-station.workflow-users.restore :user="$user" :wire:key="'restore-user-base-station-workflow-' . $user->id" />
                @endcan
                @can('force delete base-station workflow user')
                    <livewire:workflow.base-station.workflow-users.remove :user="$user" :wire:key="'delete-user-base-station-workflow-' . $user->id" />
                @endcan
            @else
                @can('delete base-station workflow user')
                    <livewire:workflow.base-station.workflow-users.remove :user="$user" :wire:key="'delete-user-base-station-workflow-' . $user->id" />
                @endcan
            @endif
        </td>
    </tr>
@endforeach
</tbody>
