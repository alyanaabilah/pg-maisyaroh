<?php

namespace App\Http\Controllers\attribut;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();

        // $parents = Category::getParent()->orderBy('nama', 'ASC')->get();

        // $category = Category::all();
        return view('admin.attribut.kategori.index', [
            "title" => "Category",
            "category" => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attribut.kategori.create-kategori', [
            "title" => "Tambah Category"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'image|file',
            'slug' => 'required|string|max:50|unique:categories'
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('uploads');
        }

        Category::create($validatedData);
        return redirect('admin/category')->with('success', 'Kategori Baru Ditambahkan!');
        // $category = new Category();
        // if ($request->hasFile('photo')) {
        //     $file = $request->file('photo');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $ext;
        //     $file->move('admin/assets/photo/uploads/category', $filename);
        //     $category->photo = $filename;
        // }
        // $this->validate($request, [
        //     'nama' => 'required|string|max:50',
        //     'slug' => 'required|string|max:50|unique:category'
        // ]);
        // $category->nama = $request->input('nama');
        // $category->slug = $request->input('slug');
        // $category->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::find($id);
        return view('admin.attribut.kategori.edit-kategori', [
            "title" => "Edit Category",
            "category" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|string|max:50',
            'image' => 'image|file'

        ];
        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|string|max:50|unique:categories';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('uploads');
        }
        Category::where('id', $category->id)
            ->update($validatedData);
        return redirect('admin/category')->with('update', 'Berhasil Edit Kategori!');


        // $category = Category::find($id);
        // if ($request->hasFile('photo')) {
        //     $path = 'admin/assets/photo/uploads/category/' . $category->photo;
        //     if (File::exists($path)) {
        //         File::delete($path);
        //     }
        //     $file = $request->file('photo');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $ext;
        //     $file->move('admin/assets/photo/uploads/category', $filename);
        //     $category->photo = $filename;
        // }
        // $category->nama = $request->input('nama');
        // $category->slug = $request->input('slug');
        // $category->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::delete($category->image);
        }
        // $category->delete();
        Category::destroy($category->id);
        return redirect('admin/category')->with('delete', 'Berhasil Hapus Kategori!');
    }
}
