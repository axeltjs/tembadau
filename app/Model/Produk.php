<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    protected $table   = 'produk';
	public $timestamps = true;
	use SoftDeletes;

	protected $fillable = [
        'nama',
        'qty',
        'jenis_produk', // khusus produk
        'harga',
        'lokasi_beli', // khusus bahan
        'produk'
    ];
}
