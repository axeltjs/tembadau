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

    public function scopeFilter($query, $request)
    {
        if($request->has('q')){
            return $query->where('nama','like','%'.$request->get('q').'%')
            ->orWhere('jenis_produk','like','%'.$request->get('q').'%')
            ->orWhere('lokasi_beli','like','%'.$request->get('q').'%');
        }
    }
}
