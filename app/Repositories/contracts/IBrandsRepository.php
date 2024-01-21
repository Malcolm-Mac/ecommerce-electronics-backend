<?php

namespace App\Repositories\contracts;

use App\Models\Brand;

interface IBrandsRepository
{
    public function all($number): Brand;
    public function find($id): Brand;
    public function create($data): Brand;
    public function update($id, $name): Brand;
    public function delete($id): void;
}
