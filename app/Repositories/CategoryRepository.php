<?php

namespace App\Repositories;

use App\Models\{Category};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CategoryRepository 
{
    public function all(): Collection {
        $categories = Category::orderBy('name')->get();
        return $categories;
    }

    public function store(Request $request): void {
        Category::create([
            'name' => $request->name
        ]); 
    }

    public function update(Request $request, int $id): void {
        Category::whereId($id)
                ->update(['name' => $request->name]);
    }

    public function delete(int $id) : void {
        Category::destroy($id);
    }
}
