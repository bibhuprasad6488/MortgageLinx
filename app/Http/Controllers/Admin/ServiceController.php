<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('category')->orderByDesc('id')->get()->map(function ($s) {
            $s->service_image = $s->service_image ? asset('storage/images/services/' . $s->service_image) : '';
            return $s;
        });
        return view('admin.services.list', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $serviceCats = ServiceCategory::orderByDesc('id')->get();
        return view('admin.services.add', compact('serviceCats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:service_categories,title',
            'short_desc' => 'required',
            'category_id' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $service = new Service();
            $service->title = trim($request->title);
            $service->slug = Str::slug(trim($request->title));
            $service->category_id = $request->category_id;
            $service->short_desc = $request->short_desc;
            $service->content = $request->content ? preg_replace('/[^\x20-\x7E]/u', '', $request->content) : '';

            // /** Upload Path */
            $destinationPath = public_path('storage/images/services/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Banner Logo
            if ($request->hasFile('service_image')) {
                $file = $request->file('service_image');
                $sImage = 'banner_' . time() . '_' . $file->getClientOriginalName();

                $file->move($destinationPath, $sImage);
                $service->service_image = $sImage;
            }

            $service->save();
            DB::commit();

            return redirect()->route('admin.services.index')->with('success', 'Service Added successfully');
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
        $serviceCats = ServiceCategory::orderByDesc('id')->get();
        $service = Service::find($id);
        $service->service_image = $service->service_image ? asset('storage/images/services/' . $service->service_image) : '';
        return view('admin.services.edit', compact('service', 'serviceCats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|unique:service_categories,title,' . $id,
            'short_desc' => 'required',
            'category_id' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $service =  Service::find($id);
            $service->title = trim($request->title);
            $service->slug = Str::slug(trim($request->title));
            $service->category_id = $request->category_id;
            $service->short_desc = $request->short_desc;
            $service->content = $request->content ? preg_replace('/[^\x20-\x7E]/u', '', $request->content) : '';

            // /** Upload Path */
            $destinationPath = public_path('storage/images/services/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Banner Logo
            if ($request->hasFile('service_image')) {
                $file = $request->file('service_image');
                $sImage = 'banner_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($service->service_image)) {
                    $oldFilePath = $destinationPath . $service->service_image;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $sImage);
                $service->service_image = $sImage;
            }

            $service->save();
            DB::commit();

            return redirect()->route('admin.services.index')->with('success', 'Service updated successfully');
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
            $service = Service::find($id);
            $destinationPath = public_path('storage/images/services/');

            if (!empty($service->cat_image)) {
                $oldFilePath = $destinationPath . $service->cat_image;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $service->delete();

            return back()->with('success', 'Service Deleted successfully');
        } catch (\Throwable $th) {
            return back()->with('error', 'Error: ' . $th->getMessage());
        }
    }
}
