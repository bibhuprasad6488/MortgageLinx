<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutUs = AboutUs::find(1);
        if ($aboutUs) {
            $aboutUs->banner_image = $aboutUs->banner_image ? asset('storage/images/cmspage/' . $aboutUs->banner_image) : '';
            $aboutUs->story_right_image = $aboutUs->story_right_image ? asset('storage/images/cmspage/' . $aboutUs->story_right_image) : '';
        }
        return view('admin.cmspages.about-us', compact('aboutUs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $about = AboutUs::find(1) ?? new AboutUs();
            $about->banner_title = $request->banner_title;
            $about->banner_sub_title = $request->banner_sub_title;
            $about->banner_desc = $request->banner_desc;
            $about->banner_btn_text = $request->banner_btn_text;
            $about->our_story_title = $request->our_story_title;
            $about->meta_title = $request->meta_title;
            $about->meta_desc = $request->meta_desc;
            $about->meta_keywords = $request->meta_keywords;
            $about->consultation_show = $request->consultation_show ? true : false;
            $about->our_story_desc = $request->our_story_desc ? preg_replace('/[^\x20-\x7E]/u', '', $request->our_story_desc) : '';
            $about->story_right_desc = $request->story_right_desc ? preg_replace('/[^\x20-\x7E]/u', '', $request->story_right_desc) : '';


            // /** Upload Path */
            $destinationPath = public_path('storage/images/cmspage/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Banner Image
            if ($request->hasFile('banner_image')) {
                $file = $request->file('banner_image');
                $banner = 'about_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($about->banner_image)) {
                    $oldFilePath = $destinationPath . $about->banner_image;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $banner);
                $about->banner_image = $banner;
            }

            // Story Right Image
            if ($request->hasFile('story_right_image')) {
                $file = $request->file('story_right_image');
                $rightImage = 'rimage_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($about->story_right_image)) {
                    $oldFilePath = $destinationPath . $about->story_right_image;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $rightImage);
                $about->story_right_image = $rightImage;
            }

            $about->save();

            DB::commit();
            return redirect()->back()->with('success', 'About Us page updated successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error: ' . $th->getMessage());
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
