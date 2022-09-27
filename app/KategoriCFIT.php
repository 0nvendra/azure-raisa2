<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriCFIT extends Model
{
    protected $table ="kategori_cfit";
    protected $primaryKey ='id';

    protected $fillable = [
      'skor_total',
      'iq',
      ];
}
