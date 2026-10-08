<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_produk';

    protected $fillable = ['name', 'deskripsi', 'stok', 'price'];
}