<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeRequest;
use App\Model\AdatModel;
use App\Model\DesaModel;
use App\Model\HukumModel;
use App\Model\PelanggarModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = array(
            'all' => PelanggarModel::all(),
            'desa' => DesaModel::all(),
        );
        return view('CMS.Home')->with('data', $data);
    }

    public function hukum()
    {
        $result = HukumModel::all();
        return response()->json($result);
    }

    public function create(HomeRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'isi_perjanjian' => $request->isi_perjanjian,
            'keterangan' => $request->keterangan,
            'ttd' => $date,
            'user_id' => 1,
            'hukum_id' => $request->hukum_id,
            'desa_id' => $request->desa_id,
            'created_at' => $date,
            'updated_at' => $date,
        );
        AdatModel::create($data);
        $where = AdatModel::where('created_at', $date)->value('id');

        $data2 = array(
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'umur' => $request->umur,
            'gender' => $request->gender,
            'adat_id' => $where,
            'created_at' => $date,
            'updated_at' => $date,
        );
        PelanggarModel::create($data2);
        return redirect()->back()->with('status', 'Data berhasil disimpan');
    }

    public function detail($id)
    {
        $result = PelanggarModel::where('id', $id)->with('adat_rerol')->first();
        return response()->json($result);
    }

    public function update(HomeRequest $request)
    {
        $adat_id = $request->adat_id;
        $pelanggar_id = $request->pelanggar_id;
        $date = Carbon::now();
        $data = array(
            'isi_perjanjian' => $request->isi_perjanjian,
            'keterangan' => $request->keterangan,
            'ttd' => $date,
            'user_id' => 1,
            'hukum_id' => $request->hukum_id,
            'desa_id' => $request->desa_id,
            'updated_at' => $date,
        );
        AdatModel::where('id', $adat_id)->update($data);
        $data2 = array(
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'umur' => $request->umur,
            'gender' => $request->gender,
            'adat_id' => $adat_id,
            'updated_at' => $date,
        );
        PelanggarModel::where('id', $pelanggar_id)->update($data2);
        return redirect()->back()->with('status', 'Data berhasil disimpan');
    }

    public function delete($id)
    {
        $adat_id = PelanggarModel::where('id', $id)->value('adat_id');
        PelanggarModel::where('id', $id)->delete();
        AdatModel::where('id', $adat_id)->delete();
        return response()->json();
    }
}
