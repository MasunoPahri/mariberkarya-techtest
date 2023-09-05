<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class UserService
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;   
    }

    public function fetchAll($request) 
    {
        return $this->userRepository->fetchAll($request);    
    }

    public function fetch($id) 
    {
        return $this->userRepository->fetch($id);    
    }

    public function create($request) 
    {
        $image     = $request->file('image');
        $imagePath = $image->store('images', 'public');
        $imageName = basename($imagePath);

        $data = [
            "name"      => $request->get('name'),
            "address"   => $request->get('address'),
            "image"     => Storage::disk('public')->url($imagePath)
        ];

        return $this->userRepository->create($data);    
    }

    public function update($entity, $request) 
    {
        $image     = $request->file('image');
        $imagePath = $image->store('images', 'public');
        $imageName = basename($imagePath);

        $data = [
            "name"      => $request->get('name'),
            "address"   => $request->get('address'),
            "image"     => Storage::disk('public')->url($imagePath)
        ];
        
        return $this->userRepository->update($entity, $data);    
    }
}