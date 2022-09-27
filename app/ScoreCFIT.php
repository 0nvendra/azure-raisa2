<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreCFIT extends Model
{
    protected $table ="score_cfit";
    protected $primaryKey ='id';

    protected $fillable = [
      'id_section',
      'id_soal', 
      'skor_jawaban',
      'id_candidate'
      ];
}
