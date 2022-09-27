<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPD extends Model
{
    protected $table = 'spd';
    protected $fillable = [
        'nama', 'nik', 'divisi_id', 'travel_type', 'asal', 'tujuan', 'tgl_keberangkatan',
        ];

    public function get_divisi(){
        return $this->belongsTo('App\divisi','divisi_id');
    }
}
