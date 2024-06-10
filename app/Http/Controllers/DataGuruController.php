<?php

namespace App\Http\Controllers;

use App\Models\DataGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataGuruController extends Controller
{
    public function index()
    {
        $data = DataGuru::all();
        return view('data_guru.index', ['data' => $data]);
    }

    public function tambah()
    {
        return view('data_guru.tambah');
    }

    public function edit($id)
    {
        $data = DataGuru::find($id);
        return view('data_guru.edit', ['data' => $data]);
    }

    public function hapus($id)
    {
        DataGuru::destroy($id);

        Session::flash('success', 'Berhasil Hapus Data');

        return redirect('/dataguru');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|min:3',
            'email' => 'required|email',
            'nuptk' => 'required|digits:10',
            'tempat_tanggal_lahir' => 'required|date',
            'mengajar' => 'required',
            'alamat' => 'required',
        ], [
            'nama_guru.required' => 'Nama guru wajib diisi',
            'nama_guru.min' => 'Nama guru minimal harus 3 karakter.',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'nuptk.required' => 'NUPTK wajib diisi',
            'nuptk.digits' => 'NUPTK harus terdiri dari 10 digit', 
            'tempat_tanggal_lahir.required' => 'Tempat dan tanggal lahir wajib diisi',
            'tempat_tanggal_lahir.date' => 'Format tempat dan tanggal lahir tidak valid',
            'mengajar.required' => 'Mata pelajaran yang diajarkan wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
        ]);

        DataGuru::create($request->all());

        Session::flash('success', 'Data berhasil ditambahkan');

        return redirect('/dataguru')->with('success', 'Berhasil Menambahkan Data');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_guru' => 'required|min:3',
            'email' => 'required|email',
            'nuptk' => 'required|digits:10',
            'tempat_tanggal_lahir' => 'required|date',
            'mengajar' => 'required',
            'alamat' => 'required',
        ], [
            'nama_guru.required' => 'Nama guru wajib diisi',
            'nama_guru.min' => 'Nama guru minimal harus 3 karakter.',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'nuptk.required' => 'NUPTK wajib diisi',
            'nuptk.digits' => 'NUPTK harus terdiri dari 10 digit', 
            'tempat_tanggal_lahir.required' => 'Tempat dan tanggal lahir wajib diisi',
            'tempat_tanggal_lahir.date' => 'Format tempat dan tanggal lahir tidak valid',
            'mengajar.required' => 'Mata pelajaran yang diajarkan wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
        ]);

        $dataguru = DataGuru::find($id);

        $dataguru->update($request->all());

        Session::flash('success', 'Berhasil mengubah data');

        return redirect('/dataguru');
    }

    public function change(Request $request)
{
    $request->validate([
        'nama_guru' => 'required|min:3',
        'email' => 'required|email',
        'nuptk' => 'required|digits:10',
        'tempat_tanggal_lahir' => 'required|date',
        'mengajar' => 'required',
        'alamat' => 'required',
    ], [
        'nama_guru.required' => 'Nama guru wajib diisi',
        'nama_guru.min' => 'Nama guru minimal harus 3 karakter.',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'nuptk.required' => 'NUPTK wajib diisi',
        'nuptk.digits' => 'NUPTK harus terdiri dari 10 digit', 
        'tempat_tanggal_lahir.required' => 'Tempat dan tanggal lahir wajib diisi',
        'tempat_tanggal_lahir.date' => 'Format tempat dan tanggal lahir tidak valid',
        'mengajar.required' => 'Mata pelajaran yang diajarkan wajib diisi',
        'alamat.required' => 'Alamat wajib diisi',
    ]);

    $dataguru = DataGuru::find($request->id);

    $dataguru->update($request->all());

    Session::flash('success', 'Berhasil mengubah data');

    return redirect('/dataguru');
}

}

