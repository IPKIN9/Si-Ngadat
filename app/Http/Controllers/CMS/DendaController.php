<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\DendaRequest;
use App\Http\Requests\DendaUpdateRequest;
use App\Model\DendaModel;
use App\Model\DesaModel;
use App\Model\HukumModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DendaController extends Controller
{
    public function index()
    {
        $data = array(
            'desa' => DesaModel::all(),
        );
        return view('CMS/Denda')->with('data', $data);
    }

    public function hukum()
    {
        $result = HukumModel::all();
        return response()->json($result);
    }

    public function create(DendaRequest $request)
    {
        $date = Carbon::now();
        $random = Str::random(10);
        $kode = time() . "_" . $random;
        $desa = $request->desa_id;
        $data = $request->all();

        if (count($data['hukum_id']) > 0) {
            foreach ($data['hukum_id'] as $item => $value) {
                $data2 = array(
                    'kode' => $kode,
                    'denda' => $data['denda'][$item],
                    'hukum_id' => $data['hukum_id'][$item],
                    'desa_id' => $desa,
                    'creted_at' => $date,
                    'updated_at' => $date,
                );
                DendaModel::create($data2);
            }
            return redirect()->back()->with('status', 'Data berhasil disimpan');
        }
    }

    public function detail($id)
    {
        $result = DendaModel::where('desa_id', $id)->with('hukum_rerol', 'desa_rerol')->get();
        return response()->json($result);
    }

    public function edit($id)
    {
        $result = DendaModel::where('desa_id', $id)->with('hukum_rerol', 'desa_rerol')->get();
        return response()->json($result);
    }
    public function update(DendaUpdateRequest $request)
    {
        $date = Carbon::now();
        $data = $request->all();

        foreach ($data['denda'] as $item => $value) {
            $data2 = array(
                'denda' => $data['denda'][$item],
                'updated_at' => $date
            );
            DendaModel::where('id', $data['id'][$item])->update($data2);
        }
        return redirect()->back()->with('status', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $where = DendaModel::where('desa_id', $id)->get();
        foreach ($where as $item) {
            DendaModel::where('id', $item->id)->delete();
        }
        return response()->json();
    }
}
