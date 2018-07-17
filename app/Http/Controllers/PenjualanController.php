<?php

namespace App\Http\Controllers;

use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\PelangganRepository;
use App\Repositories\PenjualanRepository;

class PenjualanController extends Controller
{
    private $penjualanRepo;
    private $pelangganRepo;

    public function __construct(
        PenjualanRepository $penjualanRepository,
        PelangganRepository $pelangganRepository
    ) {
        $this->penjualanRepo = $penjualanRepository;
        $this->pelangganRepo = $pelangganRepository;
    }

    public function dataPenjualan()
    {
        return $this
            ->penjualanRepo
            ->getAllDataPenjualan();
    }

    public function dataTablePenjualan()
    {
        $penjualan = $this
            ->penjualanRepo
            ->getAllDataPenjualan();

        return DataTables::of($penjualan)
            ->addColumn('action', function($penjualan){
                return '<center><a href="/penjualan/form-ubah/'.$penjualan->id.'" class="btn btn-info btn-xs"><i class="ion ion-search"></i></a> <a href="/penjualan/form-ubah/'.$penjualan->id.'" class="btn btn-warning btn-xs"><i class="ion ion-edit"></i></a> <a href="#" onclick="destroy('.$penjualan->id.')" class="btn btn-xs btn-danger"><i class="ion ion-close"></i></a></center>';
            })
            ->editColumn('tanggal_keberangkatan', function($penjualan){
                return Carbon::parse($penjualan->tanggal_keberangkatan)
                    ->formatLocalized('%d %B %Y');
                // return $pelanggan
                //     ->tanggal_keberangkatan
                //     ->formatLocalized('%A %d %B %Y');
            })
            ->editColumn('status', function($penjualan){
                if($penjualan->status == 1){
                    return '<span class="badge badge-success"><i class="ion ion-checkmark"></i> Confirmed</span>';
                }else{
                    return '<span class="badge badge-danger"><i class="ion ion-close"></i> Not confirmed</span>';
                }
            })
            ->rawColumns(['action', 'status', 'tanggal_keberangkatan'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $penjualan = $this
            ->penjualanRepo
            ->getSingleDataPenjualan($id);

        return view('penjualan.detail', compact(
            'penjualan'
        ));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penjualan.penjualan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = $this
            ->pelangganRepo
            ->getAllDataPelanggan();

        return view('penjualan.form-tambah', compact(
            'pelanggan'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penjualan = [
            'nik' => $request->nik,
            'nomor_tiket' => $request->nomor_tiket,
            'kode_tiket' => $request->kode_tiket,
            'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
            'kota_keberangkatan' => $request->kota_keberangkatan,
            'kota_kedatangan' => $request->kota_kedatangan,
            'harga_tiket' => $request->harga_tiket,
            'jumlah_tiket' => $request->jumlah_tiket,
            'total_harga' => $request->total_harga,
            'status' => $request->status
        ];

        $store = $this
            ->penjualanRepo
            ->storeDataPenjualan($penjualan);

        return redirect('/penjualan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
