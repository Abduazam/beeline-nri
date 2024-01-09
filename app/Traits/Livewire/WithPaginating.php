<?php

namespace App\Traits\Livewire;

use Livewire\WithPagination;

trait WithPaginating
{
    use WithPagination;

    public int $perPage = 15;

    public function paginationView(): string
    {
        return 'components.pagination-bar';
    }
}
