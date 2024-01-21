<?php

namespace App\Repositories\implementations;

use App\Models\Category;
use App\Repositories\contracts\ICategoriesRepository;
use Exception;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class CategoriesRepository implements ICategoriesRepository
{
    /**
     * Function returns all Categories
     *
     * @param integer $number
     * @return collection
     */
    public function all($number): Category
    {
        $categories = Category::paginate($number);
        return $categories;
    }
    /**
     * Function returns a Category
     *
     * @param integer $id
     * @return collection
     */
    public function find($id): Category
    {
        $category = Category::find($id);
        return $category;
    }
    /**
     * Function creates a new Category
     *
     * @return Category
     */
    public function create($data): Category
    {
        $category = Category::create($data);
        return $category;
    }
    /**
     * Function returns a Category
     *
     * @param integer $id
     * @param string $name
     * @param string $image
     * @return collection
     */
    public function update($id, $data): Category
    {
        //$category = Category::where('id', $id)->update(['name' => $data['name'], $data['image'] => $image]);
        try {

            $category = Category::find($id);
            if ($data['image']) {
                $path = 'assets/uploads/category/' . $category->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file = $data['image'];
                $ext = $file->getClientOriginalExtention();
                $filename = time() . '.' . $ext;
                try {
                } catch (FileException $e) {
                    dd($e);
                }
                $category->image = $filename;
            }
            $category->name = $data['name'];
            $category->update();
            return $category;
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Function returns a Category
     *
     * @param integer $id
     * @return void
     */
    public function delete($id): void
    {
        $category = Category::find($id);
        $category->delete();
    }
}
