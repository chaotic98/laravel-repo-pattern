<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

abstract class BaseRepository
{
    protected Builder|Model $query;
    public function __construct()
    {
        $this->query = (new $this->model);
    }

    public function getAll()
    {
        return $this->query->all();
    }

    public function findById($id)
    {
        return $this->query->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->query->destroy($id);
    }

    public function create(array $postDetails)
    {
        return  $this->query->create($postDetails);
    }

    public function update($id, array $newData)
    {
        $post = $this->findById($id);
        return  $post->update($newData);
    }
}
