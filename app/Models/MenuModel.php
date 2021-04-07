<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MenuModel extends Model
{
    use HasFactory;
    protected $table = 'menu';
    public $timestamps = true;

    // protected $casts = [
    //     'id_transaksi' => 'string'
    // ];

    protected $fillable = ['id_menu', 'nama_menu']; //atribut tabel
    protected $primaryKey = 'id_menu';
}
