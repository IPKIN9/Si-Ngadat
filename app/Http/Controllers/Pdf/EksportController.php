<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Model\DendaModel;
use App\Model\PelanggarModel;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;

class EksportController extends Controller
{
    public function print_pdf(Request $request)
    {
        $id = $request->id_pdf;
        $pelanggar = PelanggarModel::where('id', $id)->with('adat_rerol')->first();

        $hukum = $pelanggar->adat_rerol->hukum_id;
        $desa = $pelanggar->adat_rerol->desa_id;
        $denda = DendaModel::where([
            ['hukum_id', $hukum],
            ['desa_id', $desa]
        ])->first();
        $data = array(
            'pelanggar' => $pelanggar,
            'denda' => $denda,
            'date' => Carbon::now()->format('d F Y')
        );
        // return view('Paper.A4', ['data' => $data]);
        $pdf = PDF::loadView('Paper.A4', ['data' => $data])->setPaper('A4', 'potrait');
        return $pdf->download('invoice.pdf');
    }
}
