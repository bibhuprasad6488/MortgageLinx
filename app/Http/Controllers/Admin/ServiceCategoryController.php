<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ServiceCategory::orderByDesc('id')->get()->map(function ($c) {
            $c->cat_image = $c->cat_image ? asset('storage/images/service_category/' . $c->cat_image) : '';
            $c->footer_icon = $c->footer_icon ? asset('storage/images/service_category/' . $c->footer_icon) : '';
            return $c;
        });
        return view('admin.servicecategories.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.servicecategories.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:service_categories,title',
            'short_desc' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $category = new ServiceCategory();
            $category->title = trim($request->title);
            $category->slug = Str::slug(trim($request->title));
            $category->short_desc = $request->short_desc;
            $category->show_on_home = $request->show_on_home ? 1 : 0;
            $category->meta_title = $request->meta_title;
            $category->meta_desc = $request->meta_desc;
            $category->meta_keywords = $request->meta_keywords;

            // /** Upload Path */
            $destinationPath = public_path('storage/images/service_category/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Banner Logo
            if ($request->hasFile('cat_image')) {
                $file = $request->file('cat_image');
                $catImage = 'banner_' . time() . '_' . $file->getClientOriginalName();

                $file->move($destinationPath, $catImage);
                $category->cat_image = $catImage;
            }

            // Footer Icon
            if ($request->hasFile('footer_icon')) {
                $file = $request->file('footer_icon');
                $catfIcon = 'catfIcon_' . time() . '_' . $file->getClientOriginalName();

                $file->move($destinationPath, $catfIcon);
                $category->footer_icon = $catfIcon;
            }

            $category->save();
            DB::commit();

            return redirect()->route('admin.service-categories.index')->with('success', 'Category Added successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Error: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = ServiceCategory::find($id);
        $category->cat_image = $category->cat_image ? asset('storage/images/service_category/' . $category->cat_image) : '';
        $category->footer_icon = $category->footer_icon ? asset('storage/images/service_category/' . $category->footer_icon) : '';

        return view('admin.servicecategories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|unique:service_categories,title,' . $id,
            'short_desc' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $category =  ServiceCategory::find($id);
            $category->title = trim($request->title);
            $category->slug = Str::slug(trim($request->title));
            $category->short_desc = $request->short_desc;
            $category->show_on_home = $request->show_on_home ? 1 : 0;
            $category->meta_title = $request->meta_title;
            $category->meta_desc = $request->meta_desc;
            $category->meta_keywords = $request->meta_keywords;

            // /** Upload Path */
            $destinationPath = public_path('storage/images/service_category/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Banner Logo
            if ($request->hasFile('cat_image')) {
                $file = $request->file('cat_image');
                $catImage = 'banner_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($category->cat_image)) {
                    $oldFilePath = $destinationPath . $category->cat_image;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $catImage);
                $category->cat_image = $catImage;
            }

            if ($request->hasFile('footer_icon')) {
                $file = $request->file('footer_icon');
                $catfIcon = 'catfIcon_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($category->footer_icon)) {
                    $oldFilePath = $destinationPath . $category->footer_icon;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $catfIcon);
                $category->footer_icon = $catfIcon;
            }

            $category->save();
            DB::commit();

            return redirect()->route('admin.service-categories.index')->with('success', 'Category updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Error: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = ServiceCategory::find($id);
            $services = Service::where('category_id', $category->id)->get();
            foreach ($services as  $service) {

                $destinationPath = public_path('storage/images/services/');

                if (!empty($service->cat_image)) {
                    $oldFilePath = $destinationPath . $service->cat_image;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }
                $service->delete();
            }

            $destinationPath = public_path('storage/images/service_category/');

            if (!empty($category->cat_image)) {
                $oldFilePath = $destinationPath . $category->cat_image;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            if (!empty($category->footer_icon)) {
                $oldFilePath = $destinationPath . $category->footer_icon;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $category->delete();

            return back()->with('success', 'Category Deleted successfully');
        } catch (\Throwable $th) {
            return back()->with('error', 'Error: ' . $th->getMessage());
        }
    }
}
