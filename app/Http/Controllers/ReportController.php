<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get filter stock
        return view('report/filterstock');
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
     * @param  \App\Http\Requests\StoreReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $dd1 = substr($request->stock_tgl1,0,2);
      $mm1 = substr($request->stock_tgl1,3,2);
      $yyyy1 = substr($request->stock_tgl1,6,4);
      $tgl1 = $yyyy1."-".$mm1."-".$dd1;

      $dd2 = substr($request->stock_tgl2,0,2);
      $mm2 = substr($request->stock_tgl2,3,2);
      $yyyy2 = substr($request->stock_tgl2,6,4);
      $tgl2 = $yyyy2."-".$mm2."-".$dd2;
      // dd($fd);
      
        $stock = DB::table('products')
        ->whereBetween('updated_at', [$tgl1, $tgl2])
        ->get();

        $pdf = PDF::loadView('report/reportstock', ['data_reportstock' => $stock])->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportRequest  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
