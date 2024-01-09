<?php

namespace App\Models\Imports\Excel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadedExcelFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];
}
