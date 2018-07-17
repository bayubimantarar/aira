<?php

namespace App\Http\Controllers;

use DataTables;
use App\Pelanggan;
use App\Http\Requests\PelangganRequest;
use App\Repositories\PelangganRepository;

class PelangganController extends Controller
{
    private $pelangganRepo;

    public function __construct(PelangganRepository $pelangganRepository){
        $this->pelangganRepo = $pelangganRepository;
    }

    /**
     * Display dataTable pengguna.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataJsonPengguna()
    {
        return response()
            ->json([
                'data' => $this->pelangganRepo->getAllDataPelanggan()
            ], 200);
    }

    /**
     * Display dataTable pengguna.
     *
     * @return \Illuminate\Http\Response
     */
    public function singleDataJsonPengguna($id)
    {
        return response()
            ->json([
                'data' => $this->pelangganRepo->getSingleDataPelanggan($id)
            ], 200);
    }    

    /**
     * Display dataTable pengguna.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataTablePengguna()
    {
        $pelanggan = $this
            ->pelangganRepo
            ->getAllDataPelanggan();

        return DataTables::of($pelanggan)
            ->addColumn('action', function($pelanggan){
                return '<center><a href="/pelanggan/form-ubah/'.$pelanggan->id.'" class="edit_button btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a> <a href="#" onclick="destroy('.$pelanggan->id.')" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a></center>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelanggan.pelanggan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.form-tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PelangganRequest $pelangganReq)
    {
        $pelanggan = [
            'nik' => $pelangganReq->nik,
            'nama' => $pelangganReq->nama,
            'alamat' => $pelangganReq->alamat,
            'email' => $pelangganReq->email,
            'nomor_telepon' => $pelangganReq->nomor_telepon,
        ];

        $store = $this
            ->pelangganRepo
            ->storeDataPelanggan($pelanggan);

        return redirect('/pelanggan')->with([
            'notification' => 'Data berhasil disimpan ...'
        ]);
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
        $pelanggan = $this
            ->pelangganRepo
            ->getSingleDataPelanggan($id);

        return view('pelanggan.form-ubah', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(pelangganRequest $pelangganReq, $id)
    {
        $pelanggan = [
            'nik' => $pelangganReq->nik,
            'nama' => $pelangganReq->nama,
            'alamat' => $pelangganReq->alamat,
            'email' => $pelangganReq->email,
            'nomor_telepon' => $pelangganReq->nomor_telepon,
        ];

        if($request->nik == $request->nik){
            $pelanggan = [
                'nama' => $pelangganReq->nama,
                'alamat' => $pelangganReq->alamat,
                'email' => $pelangganReq->email,
                'nomor_telepon' => $pelangganReq->nomor_telepon,
            ];            
        }

        $store = $this
            ->pelangganRepo
            ->updateDataPelanggan($pelanggan, $id);

        return redirect('/pelanggan')->with([
            'notification' => 'Data berhasil diubah ...'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = $this
            ->pelangganRepo
            ->destroyDataPelanggan($id);

        return response()
            ->json(200);
    }
}
