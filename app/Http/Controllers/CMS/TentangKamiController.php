<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\TentangKamiRequest;
use App\Model\TentangKamiModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TentangKamiController extends Controller
{
    public function index()
    {
        $data = array(
            'all' => TentangKamiModel::all(),
        );
        return view('CMS/TentangKami')->with('data', $data);
    }

    public function create(TentangKamiRequest $request)
    {
        $count = TentangKamiModel::count();
        if ($count < 1) {
            $date = Carbon::now();
            $data = array(
                'email' => $request->email,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'deskripsi' => $request->deskripsi,
                'created_at' => $date,
                'updated_at' => $date,
            );
            DB::table('tentang_kami')->insert($data);
            return redirect()->back()->with('status', 'Data berhasil Tersimpan');
        } else {
            return redirect()->back()->with('status', 'Data Sudah Tersedia');
        }
    }

    public function edit($id)
    {
        $result = TentangKamiModel::where('id', $id)->first();
        return response()->json($result);
    }
    public function update(TentangKamiRequest $request)
    {
        $id = $request->id;
        $date = Carbon::now();
        $data = array(
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'updated_at' => $date,
        );
        TentangKamiModel::where('id', $id)->update($data);
        return redirect()->back()->with('status', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        TentangKamiModel::where('id', $id)->delete();
        return response()->json();
    }
}
