<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository
{
    public function fetchAll($request) 
    {
        $searcParam = $request->get('search');
        $collection = (new User);
        if (!is_null($searcParam)) {
            // dd($searcParam);
            $collection = $collection->where('name', 'like', '%'.$searcParam.'%');
        }

        return $collection->orderBy('id', 'DESC')->get();
    }

    public function fetch($id) 
    {
        $entity = (new User)->where('id', $id)->first();
        return $entity;
    }

    public function create($data) 
    {
        return (new User)->create($data);
    }

    public function update($entity, $data) 
    {
        return $entity->update($data);
    }

    public function delete($entity) 
    {
        return $entity->delete();
    }
}