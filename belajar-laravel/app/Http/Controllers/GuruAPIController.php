<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $guru = Guru::get();

        // return response()->json(['data' => $guru]);
        $index = DB::table('teachers')
        ->join('rooms', 'teachers.room_id', '=', 'rooms.id')
        ->select('teachers.*', 'rooms.name AS room')
        ->orderBy('teachers.name','asc')
        ->get();
        return response()->json(['data' => $index]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'major' => 'required',
        ]);
        
        $teacher = Guru::create([
            'name' => $request->name,
            'major' => $request->major,
            'room_id' => $request->room_id,
        ]);
                
        if(!$teacher) {
            return response()->json([
                "message" => "Data tidak berhasil dikirim",
            ], 422);
        } else {
            return response()->json([
                "message" => "Teacher record created",
                "data" => $teacher
            ], 201);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $teacher = Guru::find($id);

        if (!$teacher) {
            return response()->json([
                "message" => "Teacher not found"
            ], 404);
        }

        return response()->json([
            "data" => $teacher
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $teacher = Guru::find($id);
    
        if (!$teacher) {
            return response()->json([
                "message" => "Teacher not found"
            ], 404);
        }
    
        $request->validate([
            'name' => 'required',
            'major' => 'required',
            'room_id' => 'required',
        ]);
    
        $teacher->update($request->all());
    
        return response()->json([
            "message" => "Teacher record updated",
            "data" => $teacher
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $teacher = Guru::find($id);

        if (!$teacher) {
            return response()->json([
                "message" => "Teacher not found"
            ], 404);
        }

        $teacher->delete();

        return response()->json([
            "message" => "Teacher record deleted"
        ], 200);
    }
}
