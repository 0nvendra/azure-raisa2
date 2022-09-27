<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatementCFIT extends Model
{
    protected $table ="statement_cfit";
    protected $primaryKey ='id';

    protected $fillable = [
      'image_pertanyaan',
      'image_a',
      'image_b', 
      'image_c',
      'image_d',
      'image_e',
      'image_f',
      'jawaban',
      'id_section',
      'id_soal',
      ];

    
}
