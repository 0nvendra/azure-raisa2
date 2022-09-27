<?php

namespace App\Http\Controllers\HRD\Psikotes\CFIT;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Candidate;
use App\ScoreCFIT;
use App\KategoriCFIT;
use App\StatementCFIT;
use DB; 


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['candidate'] = Candidate::all();
        return view('hrd/psikotes/CFIT/report/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate  = Candidate::where('id', $id)->first();
        //Jika Value 1 atau 0
        // $Cari_Total     = ScoreCFIT::all()->where('id_candidate', $id)->where('skor_jawaban', 1);
        // if ($Cari_Total->count() > 0) {
        //     foreach ($Cari_Total as $CT) {
        //         $array_total[] = $CT->skor_jawaban;
        //         $hasil = array_sum($array_total);
        //     }
        // }else{
        //     $hasil = 0;
        // }
        
        //Mencari Array jawaban dari tabel statement CFIT
        $CariJawaban =  StatementCFIT::where('id_section', 1)->get();
        foreach ($CariJawaban as $Cr) {
            $Array_Jawaban[] = $Cr->jawaban;  
        }

        $CariJawaban2 =  StatementCFIT::where('id_section', 2)->get();
        foreach ($CariJawaban2 as $Cr2) {
            $Array_Jawaban2[] = $Cr2->jawaban;  
        }

        $CariJawaban3 =  StatementCFIT::where('id_section', 3)->get();
        foreach ($CariJawaban3 as $Cr3) {
            $Array_Jawaban3[] = $Cr3->jawaban;  
        }

        $CariJawaban4 =  StatementCFIT::where('id_section', 4)->get();
        foreach ($CariJawaban4 as $Cr4) {
            $Array_Jawaban4[] = $Cr4->jawaban;  
        }

        $GabungJawaban = array_merge($Array_Jawaban,$Array_Jawaban3);
        $GabungJawaban2 = array_merge($GabungJawaban,$Array_Jawaban4);
        $GabungJawaban3 = array_merge($GabungJawaban2,$Array_Jawaban2);
               
        //Mencari Array skor jawaban dari tabel skor CFIT
        $Cari2 =  ScoreCFIT::all()->where('id_candidate', $id)->where('id_section', '!=' , 2 );
        if ($Cari2->count() > 0) {
            foreach ($Cari2 as $Cr2) {
                $Array_User[] = $Cr2->skor_jawaban; 
            }
        }else{
            $Array_User[] = null;
        }
        
        
        //GABUNG SOAL 1
        $CariNo1 =  ScoreCFIT::all()->where('id_candidate', $id)->where('id_section', 2)->where('id_soal', 1);
        foreach ($CariNo1 as $crno1) {
            $Array_Userno1[] = $crno1->skor_jawaban;
            $checkbox = join(',' , $Array_Userno1);
                
        }
        $coba[] = $checkbox;
        $GabungArray = array_merge($Array_User,$coba);
       
        //GABUNG SOAL 2
        $CariNo2 =  ScoreCFIT::all()->where('id_candidate', $id)->where('id_section', 2)->where('id_soal', 2);
        foreach ($CariNo2 as $crno2) {
            $Array_Userno2[] = $crno2->skor_jawaban;
            $checkbox2 = join(',' , $Array_Userno2);
                
        }
        $coba2[] = $checkbox2;
        $GabungArray2 = array_merge($GabungArray,$coba2);
        
        //GABUNG SOAL 3
        $CariNo3 =  ScoreCFIT::all()->where('id_candidate', $id)->where('id_section', 2)->where('id_soal', 3);
        foreach ($CariNo3 as $crno3) {
            $Array_Userno3[] = $crno3->skor_jawaban;
            $checkbox3 = join(',' , $Array_Userno3);
                
        }
        $coba3[] = $checkbox3;
        $GabungArray3 = array_merge($GabungArray2,$coba3);
        
        //GABUNG SOAL 4
        $CariNo4 =  ScoreCFIT::all()->where('id_candidate', $id)->where('id_section', 2)->where('id_soal', 4);
        foreach ($CariNo4 as $crno4) {
            $Array_Userno4[] = $crno4->skor_jawaban;
            $checkbox4 = join(',' , $Array_Userno4);
                
        }
        $coba4[] = $checkbox4;
        $GabungArray4 = array_merge($GabungArray3,$coba4);
        ;
        //GABUNG SOAL 5
        $CariNo5 =  ScoreCFIT::all()->where('id_candidate', $id)->where('id_section', 2)->where('id_soal', 5);
        foreach ($CariNo5 as $crno5) {
            $Array_Userno5[] = $crno5->skor_jawaban;
            $checkbox5 = join(',' , $Array_Userno5);
                
        }
        $coba5[] = $checkbox5;
        $GabungArray5 = array_merge($GabungArray4,$coba5);

        //GABUNG SOAL 6
        $CariNo6 =  ScoreCFIT::all()->where('id_candidate', $id)->where('id_section', 2)->where('id_soal', 6);
        foreach ($CariNo6 as $crno6) {
            $Array_Userno6[] = $crno6->skor_jawaban;
            $checkbox6 = join(',' , $Array_Userno6);
                
        }
        $coba6[] = $checkbox6;
        $GabungArray6 = array_merge($GabungArray5,$coba6);

        //GABUNG SOAL 7
        $CariNo7 =  ScoreCFIT::all()->where('id_candidate', $id)->where('id_section', 2)->where('id_soal', 7);
        foreach ($CariNo7 as $crno7) {
            $Array_Userno7[] = $crno7->skor_jawaban;
            $checkbox7 = join(',' , $Array_Userno7);
                
        }
        $coba7[] = $checkbox7;
        $GabungArray7 = array_merge($GabungArray6,$coba7);

        //GABUNG SOAL 8
        $CariNo8 =  ScoreCFIT::all()->where('id_candidate', $id)->where('id_section', 2)->where('id_soal', 8);
        foreach ($CariNo8 as $crno8) {
            $Array_Userno8[] = $crno8->skor_jawaban;
            $checkbox8 = join(',' , $Array_Userno8);
                
        }
        $coba8[] = $checkbox8;
        $GabungArray8 = array_merge($GabungArray7,$coba8);

        //GABUNG SOAL 9
        $CariNo9 =  ScoreCFIT::all()->where('id_candidate', $id)->where('id_section', 2)->where('id_soal', 9);
        foreach ($CariNo9 as $crno9) {
            $Array_Userno9[] = $crno9->skor_jawaban;
            $checkbox9 = join(',' , $Array_Userno9);
                
        }
        $coba9[] = $checkbox9;
        $GabungArray9 = array_merge($GabungArray8,$coba9);

        //GABUNG SOAL 10
        $CariNo10 =  ScoreCFIT::all()->where('id_candidate', $id)->where('id_section', 2)->where('id_soal', 10);
        foreach ($CariNo10 as $crno10) {
            $Array_Userno10[] = $crno10->skor_jawaban;
            $checkbox10 = join(',' , $Array_Userno10);
                
        }
        $coba10[] = $checkbox10;
        $GabungArray10 = array_merge($GabungArray9,$coba10);

        //GABUNG SOAL 11
        $CariNo11 =  ScoreCFIT::all()->where('id_candidate', $id)->where('id_section', 2)->where('id_soal', 11);
        foreach ($CariNo11 as $crno11) {
            $Array_Userno11[] = $crno11->skor_jawaban;
            $checkbox11 = join(',' , $Array_Userno11);
                
        }
        $coba11[] = $checkbox11;
        $GabungArray11 = array_merge($GabungArray10,$coba11);

        //GABUNG SOAL 12
        $CariNo12 =  ScoreCFIT::all()->where('id_candidate', $id)->where('id_section', 2)->where('id_soal', 12);
        foreach ($CariNo12 as $crno12) {
            $Array_Userno12[] = $crno12->skor_jawaban;
            $checkbox12 = join(',' , $Array_Userno12);
                
        }
        $coba12[] = $checkbox12;
        $GabungArray12 = array_merge($GabungArray11,$coba12);

        //GABUNG SOAL 13
        $CariNo13 =  ScoreCFIT::all()->where('id_candidate', $id)->where('id_section', 2)->where('id_soal', 13);
        foreach ($CariNo13 as $crno13) {
            $Array_Userno13[] = $crno13->skor_jawaban;
            $checkbox13 = join(',' , $Array_Userno13);
                
        }
        $coba13[] = $checkbox13;
        $GabungArray13 = array_merge($GabungArray12,$coba13);

        //GABUNG SOAL 14
        $CariNo14 =  ScoreCFIT::all()->where('id_candidate', $id)->where('id_section', 2)->where('id_soal', 14);
        foreach ($CariNo14 as $crno14) {
            $Array_Userno14[] = $crno14->skor_jawaban;
            $checkbox14 = join(',' , $Array_Userno14);
                
        }
        $coba14[] = $checkbox14;
        $GabungArray14 = array_merge($GabungArray13,$coba14);

      
        //MENENTUKAN JUMLAH YANG BENAR
        $hasil = 1;
        $i = 0;
        foreach($GabungArray14 as $user_key){
            
            if($user_key == $GabungJawaban3[$i] ) $hasil += 1;
            $i++;
        }
        
        //MENENTUKAN SKALA IQ
        $category = KategoriCFIT::all()->where('skor_total', $hasil);

        $data    = compact("candidate", "hasil","category");
        return view('hrd/psikotes/CFIT/report/detail')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
