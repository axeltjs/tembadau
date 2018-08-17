<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Konsumen extends Model
{
    protected $table   = 'konsumen';
	public $timestamps = true;
	use SoftDeletes;

	protected $fillable = [
        'no_konsumen',
        'nama',
        'alamat',
        'kontak'
    ];

    public function scopeFilter($query, $request)
    {
        if($request->has('q')){
            return $query->where('no_konsumen','like','%'.$request->get('q').'%')
            ->orWhere('nama','like','%'.$request->get('q').'%')
            ->orWhere('kontak','like','%'.$request->get('q').'%')
            ->orWhere('alamat','like','%'.$request->get('q').'%');
        }
    }
}
