<?php

namespace App\Repositories\contracts;

use App\Models\Category;

interface ICategoriesRepository
{
    public function all($number): Category;
    public function find($id): Category;
    public function create($data): Category;
    public function update($id, $data): Category;
    public function delete($id): void;
}
