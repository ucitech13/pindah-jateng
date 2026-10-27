<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opd extends Model
{
    use SoftDeletes;

    protected $table = 'pnd_opd';

    protected $fillable = ['nama_opd', 'no_urut', 'created_by'];

    protected function casts(): array
    {
        return [
            'no_urut' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }
}
