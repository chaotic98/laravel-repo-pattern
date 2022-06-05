<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function delete($id);
    public function create(array $postDetails);
    public function update($id, array $newData);
}
