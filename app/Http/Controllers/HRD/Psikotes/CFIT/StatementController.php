<?php

namespace App\Http\Controllers\HRD\Psikotes\CFIT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StatementCFIT;
use Carbon\Carbon;

class StatementController extends Controller
{
    public function index()
    {
        $data = StatementCFIT::groupBy('id', 'id_section')->orderBy('created_at', 'asc')->get();
        return view('hrd.psikotes.CFIT.masterdata.statement.index', ['data' => $data]);    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data              = new StatementCFIT();
            $data->id_section  = $request->id_section;
            if ($request->hasFile('image_pertanyaan')) {
                $namefile = $request->id_section.$request->file('image_pertanyaan')->getClientOriginalName();
                $request->file('image_pertanyaan')->move('uploads/HRD/Psikotes/images_CFIT/', $namefile);
                $data->image_pertanyaan = $namefile;
            }
            if ($request->hasFile('image_a')) {
                $namefile = 'Test_'.$request->id_section.$request->file('image_a')->getClientOriginalName();
                $request->file('image_a')->move('uploads/HRD/Psikotes/images_CFIT/', $namefile);
                $data->image_a = $namefile;
            }
            if ($request->hasFile('image_b')) {
                $namefile = 'Test_'.$request->id_section.$request->file('image_b')->getClientOriginalName();
                $request->file('image_b')->move('uploads/HRD/Psikotes/images_CFIT/', $namefile);
                $data->image_b = $namefile;
            }
            if ($request->hasFile('image_c')) {
                $namefile = 'Test_'.$request->id_section.$request->file('image_c')->getClientOriginalName();
                $request->file('image_c')->move('uploads/HRD/Psikotes/images_CFIT/', $namefile);
                $data->image_c = $namefile;
            }
            if ($request->hasFile('image_d')) {
                $namefile = 'Test_'.$request->id_section.$request->file('image_d')->getClientOriginalName();
                $request->file('image_d')->move('uploads/HRD/Psikotes/images_CFIT/', $namefile);
                $data->image_d = $namefile;
            }
            if ($request->hasFile('image_e')) {
                $namefile = 'Test_'.$request->id_section.$request->file('image_e')->getClientOriginalName();
                $request->file('image_e')->move('uploads/HRD/Psikotes/images_CFIT/', $namefile);
                $data->image_e = $namefile;
            }
            if ($request->hasFile('image_f')) {
                $namefile = 'Test_'.$request->id_section.$request->file('image_f')->getClientOriginalName();
                $request->file('image_f')->move('uploads/HRD/Psikotes/images_CFIT/', $namefile);
                $data->image_f = $namefile;
            }
            $data->jawaban           = $request->jawaban;
            $data->id_soal           = $request->id_soal;
            $data->created_at       = Carbon::now()->toDateTimeString();
            //dd($data);
            $data->save();

            return redirect('/statement-cfit')->with('success', 'Data successfully added');
        }
        catch(\Exception $e){
                return redirect('/statement-cfit')->with('failed', 'Please check your data again');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statement =  StatementCFIT::find($id);
        return response()->json([
            'data' => $statement
          ]);
          
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
        try{
            $data              = StatementCFIT::find($id);
            $data->jawaban  = $request->input('edit_jawaban');
            $data->id_section          = $request->input('edit_id_section');
            $data->created_at  = Carbon::now()->toDateTimeString();
            $data->save();
            return response()->json(['success' => true ]);
        }
        catch(\Exception $e){
            return response()->json(['failed' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = StatementCFIT::destroy($id);
        if($data){
            return response()->json([
                'success'=> 'Data successfully deleted'
            ]);
        }
        else{
            return response()->json([
                'failes'=> 'Data failed deleted'
            ]);
        }
        return response($response);
    }
}
