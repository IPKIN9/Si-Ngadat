<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\HukumRequest;
use App\Model\HukumModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HukumController extends Controller
{
    public function index()
    {
        $data = array(
            'all' => HukumModel::all(),
        );
        return view('CMS/Hukum')->with('data', $data);
    }

    public function create(HukumRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'jenis_pelanggaran' => $request->jenis_pelanggaran,
            'keterangan' => $request->keterangan,
            'adat_id' => null,
            'denda_id' => null,
            'created_at' => $date,
            'updated_at' => $date,
        );
        DB::table('hukum')->insert($data);
        return redirect()->back()->with('status', 'Data berhasil Tersimpan');
    }

    public function edit($id)
    {
        $result = HukumModel::where('id', $id)->first();
        return response()->json($result);
    }
    public function update(HukumRequest $request)
    {
        $id = $request->id;
        $date = Carbon::now();
        $data = array(
            'jenis_pelanggaran' => $request->jenis_pelanggaran,
            'keterangan' => $request->keterangan,
            'adat_id' => null,
            'denda_id' => null,
            'updated_at' => $date,
        );
        HukumModel::where('id', $id)->update($data);
        return redirect()->back()->with('status', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        HukumModel::where('id', $id)->delete();
        return response()->json();
    }
}
