<?php

namespace App\Traits\Livewire;

trait WithSorting
{
    /**
     * Order by Order Direction filtering.
     */
    public string $orderBy = 'id';
    public string $orderDirection = 'asc';

    /**
     * By role filtering.
     */
    public ?int $role_id = null;

    /**
     * By active/inactive filtering.
     */
    public int $is_archived = 0;

    public function sortBy($column): void
    {
        $this->orderDirection = $this->orderBy === $column
            ? $this->swapSortDirection()
            : 'asc';

        $this->orderBy = $column;
    }

    public function swapSortDirection(): string
    {
        return $this->orderDirection === 'asc' ? 'desc' : 'asc';
    }
}
