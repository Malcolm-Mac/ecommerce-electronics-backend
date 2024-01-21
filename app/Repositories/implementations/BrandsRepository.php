<?php

namespace App\Repositories\implementations;

use App\Models\Brand;
use App\Repositories\contracts\IBrandsRepository;

class BrandsRepository implements IBrandsRepository
{
    /**
     * Function returns all brands
     *
     * @param integer $number
     * @return collection
     */
    public function all($number): Brand
    {
        $brands = Brand::paginate($number);
        return $brands;
    }
    /**
     * Function returns a brand
     *
     * @param integer $id
     * @return collection
     */
    public function find($id): Brand
    {
        $brands = Brand::find($id);
        return $brands;
    }
    /**
     * Function creates a new brand
     *
     * @return Brands
     */
    public function create($data): Brand
    {
        $brands = Brand::create($data);
        return $brands;
    }
    /**
     * Function returns a brand
     *
     * @param integer $id
     * @param string $name
     * @return collection
     */
    public function update($id, $name): Brand
    {
        $brands = Brand::where('id', $id)->update(['name' => $name]);
        return $brands;
    }

    /**
     * Function returns a brand
     *
     * @param integer $id
     * @return void
     */
    public function delete($id): void
    {
        $brands = Brand::find($id);
        $brands->delete();
    }
}
