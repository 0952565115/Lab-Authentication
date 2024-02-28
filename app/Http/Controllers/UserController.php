<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
        $request->validate([ // ตรวจสอบข้อมูลที่ส่งมา
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
     
        $user = User::where('email', $request->email)->first(); // ค้นหา user ใน database
     
        if (! $user || ! Hash::check($request->password, $user->password)) { // ตรวจสอบ ถ้าไม่มี user จะแจ้งเตือน
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        return $user->createToken($request->device_name)->plainTextToken; // สร้าง token และเก็บข้อมูลไว้ใน datadase
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->tokens()->delete(); // ดึงข้อมูลทั้งหมดของ Token ที่เกี่ยวข้องกับผู้ใช้ แล้วลบทุก token ออกจากระบบ
        
        return response()->json(['message' => 'Logged out'], 200);
    }
}
