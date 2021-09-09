<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\DendaRequest;
use App\Model\DendaModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DendaController extends Controller
{
    public function index()
    {
        $data = array(
            'all' => DendaModel::all()
        );
        return view('Denda')->with('data', $data);
    }

    public function create(DendaRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'kode' => $request->kode,
            'denda' => $request->denda,
            'created_at' => $date,
            'updated_at' => $date,
        );
        DB::table('denda')->insert($data);
        return redirect()->back()->with('status', 'Data berhasil Tersimpan');
    }

    public function edit($id)
    {
        $result = DendaModel::where('id', $id)->first();
        return response()->json($result);
    }
    public function update(DendaRequest $request)
    {
        $id = $request->id;
        $date = Carbon::now();
        $data = array(
            'kode' => $request->kode,
            'denda' => $request->denda,
            'updated_at' => $date,
        );
        DendaModel::where('id', $id)->update($data);
        return redirect()->back()->with('status', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        DendaModel::where('id', $id)->delete();
        return response()->json();
    }
}
