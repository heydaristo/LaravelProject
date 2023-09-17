<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class sekolah extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = [
        'nama_sekolah', 'alamat', 'jurusan', 'jumlah_guru'
    ];
}
