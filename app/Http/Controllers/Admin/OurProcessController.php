<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OurProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $process = OurProcess::find(1);
        if ($process) {
            $process->banner_image = $process->banner_image ? asset('storage/images/cmspage/' . $process->banner_image) : '';
            $process->wccu_image = $process->wccu_image ? asset('storage/images/cmspage/' . $process->wccu_image) : '';
        }
        return view('admin.cmspages.our-process', compact('process'));
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
            $about = OurProcess::find(1) ?? new OurProcess();
            $about->banner_title = $request->banner_title;
            $about->banner_sub_title = $request->banner_sub_title;
            $about->banner_desc = $request->banner_desc;
            $about->banner_btn_text = $request->banner_btn_text;
            $about->mj_title_one = $request->mj_title_one;
            $about->mj_subtitle_one = $request->mj_subtitle_one;
            $about->mj_title_two = $request->mj_title_two;
            $about->mj_subtitle_two = $request->mj_subtitle_two;
            $about->mj_title_three = $request->mj_title_three;
            $about->mj_subtitle_three = $request->mj_subtitle_three;
            $about->mj_title_four = $request->mj_title_four;
            $about->mj_subtitle_four = $request->mj_subtitle_four;
            $about->mj_title_five = $request->mj_title_five;
            $about->mj_subtitle_five = $request->mj_subtitle_five;
            $about->mj_title_six = $request->mj_title_six;
            $about->mj_subtitle_six = $request->mj_subtitle_six;
            $about->wccu_content = $request->wccu_content;
            $about->meta_title = $request->meta_title;
            $about->meta_desc = $request->meta_desc;
            $about->meta_keywords = $request->meta_keywords;

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
            if ($request->hasFile('wccu_image')) {
                $file = $request->file('wccu_image');
                $leftImage = 'limage_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($about->wccu_image)) {
                    $oldFilePath = $destinationPath . $about->wccu_image;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $leftImage);
                $about->wccu_image = $leftImage;
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
