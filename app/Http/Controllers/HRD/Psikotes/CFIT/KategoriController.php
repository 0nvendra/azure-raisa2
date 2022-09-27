<?php

namespace App\Http\Controllers\HRD\Psikotes\CFIT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\KategoriCFIT;
use Carbon\Carbon;

class KategoriController extends Controller
{
    public function index()
    {
        $data['category'] = KategoriCFIT::all();
        return view('hrd/psikotes/CFIT/masterdata/kategori/index')->with($data);
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
            $data              = new KategoriCFIT();
            $data->skor_total  = $request->skor_total;
            $data->iq          = $request->iq;
            $data->created_at  = Carbon::now()->toDateTimeString();
            //dd($data);
            $data->save();

            return redirect('/kategori-cfit')->with('success', 'Data successfully added');
        }
        catch(\Exception $e){
            return redirect('/kategori-cfit')->with('failed', 'Please check your data again');
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
        $category = KategoriCFIT::find($id);
        return response()->json([
            'data' => $category
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
            $data              = KategoriCFIT::find($id);
            $data->skor_total  = $request->input('edit_skor_total');
            $data->iq          = $request->input('edit_iq');
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
        $data = KategoriCFIT::destroy($id);
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
