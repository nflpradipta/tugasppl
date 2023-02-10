<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $fillable = ['barang_id', 'barang_nama', 'barang_total', 'barang_kondisi'];
    protected $table = 'barang';
    public $timestamps = false;
}
