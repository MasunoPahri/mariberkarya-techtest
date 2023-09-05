<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class TechTest extends Controller
{
    public $userService;
    
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function q1() 
    {
        for ($i=1; $i <= 100; $i++)
        {
            if ($i%3 == 0 && $i%5 == 0) {
                echo "Mari Berkarya,";
            } else if ($i%3 == 0) {
                echo "Mari,";
            } else if ($i%5 == 0) {
                echo "Berkarya,";
            } else {
                echo $i . ",";
            }
        }
    }

    public function fetchAll(Request $request) 
    {
        $data = $this->userService->fetchAll($request);
        return response()->json([
            "code"      => "00",
            "result"    => $data
        ]);
    }

    public function fetch($id) 
    {
        $entity = User::where('id', $id)->first();
        if (is_null($entity)) {
            return response()->json([
                "code"      => '40',
                "message"   => "User not found"
            ], 404);
        }

        $data = $this->userService->fetch($id);
        return response()->json($data);
    }

    public function create(Request $request) 
    {
        $data = $this->userService->create($request);
        return response()->json([
            "code"      => "00",
            "message"   => "Success"
        ]);
    }

    public function updateUser(Request $request, $id) 
    {
        $entity = User::where('id', $id)->first();
        if (is_null($entity)) {
            return response()->json([
                "code"      => '40',
                "message"   => "User not found"
            ], 404);
        }
        
        $data = $this->userService->update($entity, $request);
        return response()->json([
            "code"      => "00",
            "message"   => "Updated"
        ]);
    }
}
