<?php

namespace App\Http\Controllers;
use App\Models\Pasien;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\If_;

class CovidController extends Controller
{
    
    public function index()
    {
#Get all resource
       $pasiens = Pasien::all();

       $data =[
        'message' => 'Get all resource',
        'data' => $pasiens,
       ];
        return response()->json($data, 200);
    }
//Add resource
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'status' => 'required',
            'in_date_at' => 'required',
            'out_date_at' => 'nullable'
        ]);

        $pasiens = Pasien::create($validateData);

        $data = [
            'message' => 'Menambahkan data berhasil',
            'data' => $pasiens
        ];
        return response()->json($data,201);
    }
//Get Detail Resource
    public function show($id)
    {
        $pasiens = Pasien::find($id);

        if ($pasiens) {
            $data = [
                'message' => 'Get detail resource',
                'data' => $pasiens
            ];
            return response()->json($data,200);
        }else{
            $data = [
                'message' => 'Resource not found'
            ];
            return response()->json($data,404);
        }  
    }
// Edit Resource
  public function update(Request $request, $id)
  {
    $pasiens = Pasien::find($id);
    
    if($pasiens) {
       $pasiens->update($request->all());
       $data = [
        'message' => ' Resource is update successfully
        ',
        'data'=> $pasiens
       ];
       return response()->json($data,200);
    }else{
        $data = [
            'message' => 'Resource not found'
        ];
        return response()->json($data, 404);
    }
  }
// Delete Resource
  public function destroy($id)
  {
    $pasiens = Pasien::find($id);

    if ($pasiens)
    {
        $pasiens->delete();
        $data = [
            'message' => 'Resource is delete successfully'
        ];
        return response()->json($data,200);
    }else {
        $data = [
            'message' => 'Resource not found'
        ];
        return response()->json($data,404);
    }
  }
// Search Resource
  public function search($name)
  {
    $pasiens = Pasien::where('name', 'like', '%' . $name . '%') ->get();
    $total = count($pasiens);
    if ($total) {
        $data = [
            'message' => 'Get searched resource',
            'total' => $total,
            'data' => $pasiens
        ];
        return response()->json($data, 200);
    }else{
        $data = [
            'message' => 'Resource not found'
        ];
        return response()->json($data, 404);
    }
  }
// Get Positive Resource
  public function positive()
  {
    $pasiens = Pasien::where('status', 'positive')->get();
    $total = count($pasiens);
    if($total){
        $data = [
            'message' => 'Get positive resorce',
            'total pasien' => $total,
            'data pasien' => $pasiens
        ];
        return response()->json($data, 200);
    }else{
        $data = [
            'message' => 'Data kosong',
            'total pasien' => $total
        ];
        return response()->json($data, 200);
    }
  }
// Get Recovered Resource
  public function recovered()
  {
    $pasiens = Pasien::where('status', 'recovered')->get();
    $total = count($pasiens);
    if($total){
        $data = [
            'message' => 'Get recovered resource',
            'total pasien' => $total,
            'data pasien' => $pasiens
        ];
        return response()->json($data, 200);
    }else {
        $data = [
            'message' => 'Data is empty',
            'total pasien' => $total
        ];
        return response()->json($data,200);
    }
  }
// Get Dead Resource

  public function dead()
  {
    $pasiens = Pasien::where('status', 'dead')->get();
    $total = count($pasiens);

    if($total){
        $data = [
            'message' => 'Get dead resource',
            'total pasien' => $total,
            'data patients' => $pasiens
        ];
        return response()->json($data, 200);
    } else {
        $data = [
            'message' => 'Data is empty',
            'total pasien' => $total
        ];
        return response()->json($data, 200);
    }
  }
}
