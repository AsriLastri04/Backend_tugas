<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
       #menggunakan model student untuk select data
       $students = Student::all();

       $data =[
        'message' => 'Get all resource',
        'data' => $students,
       ];
        return response()->json($data, 200);
    }

    public function store (Request $request)
    {
        $input =[
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,

        ];
        $student = Student::create($input);
        $data = [
            'message' => 'Student telag di tambahkan',
            'data' => $student,
        ];
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Student::find($id);
        $data->nama = $request->nama;
        $data->nim = $request->nim;
        $data->email = $request->email;
        $data->jurusan = $request->jurusan;

        $data->save();

        $hasil = [
            "message" => "Student id $id telah di ubah",
            "data" => $data
        ];
        return response()->json($hasil);
    }
    
    public function destroy($id)
    {
        Student::destroy($id);
        $result = [
            "message" => "Student id $id telah di hapus",
            "data" => $this->index()
        ];

        return response()->json($result);
    }
}
