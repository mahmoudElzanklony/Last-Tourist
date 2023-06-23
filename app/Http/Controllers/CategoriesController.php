<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $all = Categories::query()->orderBy('id', 'DESC')->get();
        return view('admin.categories.index', compact('all'));
    }


    public function create(Request $request)
    {
        return (view('admin.categories.add'));
    }


    public function store(Request $request)
    {
        $file = $request->file('path');
        // dd($file);
        if (request()->hasFile('path')) {
            $file = $request->path->getClientOriginalExtension();
            $file_name = time() . '.' . $file;
            $path = 'images/category';
            $request->path->move($path, $file_name);
        } else {
            $file_name = 'default.png';
        }

        $category = Categories::create([
            'name' => $request->name,
            'path' => $file_name,

        ]);
        return response()->json($category);
        // return redirect()->route('categories.show');
    }

    ///this function for search
    public function show(Request $request)
    {
        $search_name = $request['search'] ?? "";
        if ($request != "") {
            $categories = Categories::where('name', 'LIKE', '%' . $search_name . '%')->orderBy('id', 'DESC')->get();
        } else {
            $categories = Categories::query()->orderBy('id', 'DESC')->get();
        }
        $data = compact('categories', 'search_name');

        return view('categories.search')->with($data);
    }



    public function edit($id)
    {
        $cat = Categories::findorfail($id);
        return view('categories.formedit', compact('cat'));
    }

    public function update(Request $request, Categories $category)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        if (request()->hasFile('path')) {
            $file = $request->path->getClientOriginalExtension();
            $file_name = time() . '.' . $file;
            $path = 'images/category';
            $request->path->move($path, $file_name);
            $category->path = $file_name;
            dd($file_name);
        }
        // Update the category name
        $category->name = $validatedData['name'];
        $category->save();

        // Return a response indicating the successful update
        return response()->json(['message' => 'Category updated successfully']);
    }
    // public function update(Request $request, $id)
    // {
    //     $data = request()->all(); // ['name'=>'abc']
    //     if (request()->hasFile('path')) {
    //         $file = $request->path->getClientOriginalExtension();
    //         $file_name = time() . '.' . $file;
    //         $path = 'images/category';
    //         $request->path->move($path, $file_name);
    //         $data['path'] = $file_name;
    //     }

    //     $cat = Categories::findorfail($id);
    //     $cat->update($data);
    //     return redirect()->route('categories.index');
    // }


    public function destroy($id)
    {
        Categories::findorfail($id)->delete();
        return redirect()->route('categories.index');
    }
}
