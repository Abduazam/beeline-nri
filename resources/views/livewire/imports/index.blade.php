<div class="row w-100 h-100 p-0">
    <x-navigation.home />
    <livewire:imports.import-excel />

    <div class="modal fade" style="background: rgba(0, 0, 0, .7)" id="modal-process" tabindex="-1" role="dialog" aria-labelledby="modal-process" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-content fs-sm">
                        <div class="progress push" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 35px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger py-3" style="width: 100%;">
                                <span class="progress-bar-label fw-semibold">Загрузка файла</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content pt-0">
        <div class="block block-rounded">
            <div class="block-content">
                <div class="table-responsive text-nowrap pb-4">
                    <table class="own-table w-100">
                        <thead>
                        <tr>
                            <th class="text-center">ИД</th>
                            <th class="text-center">Названия файла</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $file)
                            <tr>
                                <td class="text-center">{{ $file->id }}</td>
                                <td class="text-center">{{ $file->title }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('inProcess', function () {
            setTimeout(function () {
                document.getElementById('modal-process').classList.add('show', 'd-block');
            }, 500);
        });

        window.addEventListener('endProcess', function () {
            document.getElementById('modal-process').classList.remove('show', 'd-block');
        });
    </script>
@endpush
