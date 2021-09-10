<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesaRequest;
use App\Model\DesaModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesaController extends Controller
{
    public function index()
    {
        $data = array(
            'all' => DesaModel::all(),
        );
        return view('CMS/Desa')->with('data', $data);
    }

    public function create(DesaRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'nama_desa' => $request->nama_desa,
            'lokasi' => $request->lokasi,
            'created_at' => $date,
            'updated_at' => $date,
        );
        DB::table('desa')->insert($data);
        return redirect()->back()->with('status', 'Data berhasil Tersimpan');
    }

    public function edit($id)
    {
        $result = DesaModel::where('id', $id)->first();
        return response()->json($result);
    }
    public function update(DesaRequest $request)
    {
        $id = $request->id;
        $date = Carbon::now();
        $data = array(
            'nama_desa' => $request->nama_desa,
            'lokasi' => $request->lokasi,
            'updated_at' => $date,
        );
        DesaModel::where('id', $id)->update($data);
        return redirect()->back()->with('status', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        DesaModel::where('id', $id)->delete();
        return response()->json();
    }
}
