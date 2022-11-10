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
    //mendapatkan detail resource 
    // membuat method show
    public function show($id)
    {
        # cari data student
        $student = Student::find($id);

        if($student)
        {
            $data = [
                'message' => 'Get detail student',
                'data ' => $student,
            ];
            // mengembalikan data json status code 200\
            return response()->json($data,200);
        } else{
            $data = [
                'message' => 'Student not found',
            ];
            //mengembalikan data json 
            return response()->json($data,404);
        }
       
    }
    //mengupdate 

    public function mengupdate(  Request $request, $id)
    {

    //cari data student yg di update
    $student = Student::find($id);
    if ($student)
    {
    $input =[
        'nama '=> $request->nama ?? $student->nama,
        'nim ' => $request->nim ?? $student->nim,
        'email '=> $request->email ?? $student->email,
        'jurusan' => $request->jurusan ?? $student->jurusan,

    ];
    // update data
    $student->mengupdate($input);
    $data = [
        'message' => 'Resource student update',
        'data' => $student,
    ];
//mengirimkan 
return response()->json($data,200);
    }else {
        $data = [
            'message' => 'Student not found',
        ];
        //mengembalikan data json 
        return response()->json($data,404);
    }
}
}
