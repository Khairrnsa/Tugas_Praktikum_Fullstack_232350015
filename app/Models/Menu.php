<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'tbl_menu';

    protected $fillable = ['kode', 'nama'];
}
