<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CmsHomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CmsHomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homePage = CmsHomePage::find(1);

        if ($homePage) {
            $homePage->banner_logo_image = $homePage->banner_logo_image
                ? asset('storage/images/cmspage/' . $homePage->banner_logo_image)
                : '';

            $homePage->banner_image = $homePage->banner_image
                ? asset('storage/images/cmspage/' . $homePage->banner_image)
                : '';

            $homePage->f_icon_one = $homePage->f_icon_one
                ? asset('storage/images/cmspage/' . $homePage->f_icon_one)
                : '';

            $homePage->f_icon_two = $homePage->f_icon_two
                ? asset('storage/images/cmspage/' . $homePage->f_icon_two)
                : '';

            $homePage->f_icon_three = $homePage->f_icon_three
                ? asset('storage/images/cmspage/' . $homePage->f_icon_three)
                : '';

            $homePage->f_icon_four = $homePage->f_icon_four
                ? asset('storage/images/cmspage/' . $homePage->f_icon_four)
                : '';
        }
        return view('admin.cmspages.homepage', compact('homePage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->back()->with('success', 'Test Message');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner_title' => 'required|string|max:255',
        ]);
        DB::beginTransaction();
        try {
            $homePage = CmsHomePage::find(1) ?? new CmsHomePage();
            $homePage->banner_title = $request->banner_title;
            $homePage->banner_sub_title = $request->banner_sub_title;
            $homePage->banner_desc = $request->banner_desc;
            $homePage->banner_btn_text = $request->banner_btn_text;
            $homePage->banner_btn_link = $request->banner_btn_link;
            $homePage->welcome_title = $request->welcome_title;
            $homePage->welcome_sub_title = $request->welcome_sub_title;
            $homePage->f_title_one = $request->f_title_one;
            $homePage->f_subtitle_one = $request->f_subtitle_one;
            $homePage->f_title_two = $request->f_title_two;
            $homePage->f_subtitle_two = $request->f_subtitle_two;
            $homePage->f_title_three = $request->f_title_three;
            $homePage->f_subtitle_three = $request->f_subtitle_three;
            $homePage->f_title_four = $request->f_title_four;
            $homePage->f_subtitle_four = $request->f_subtitle_four;

            // /** Upload Path */
            $destinationPath = public_path('storage/images/cmspage/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Banner Logo
            if ($request->hasFile('banner_logo_image')) {
                $file = $request->file('banner_logo_image');
                $bannerLogo = 'banner_logo_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($homePage->banner_logo_image)) {
                    $oldFilePath = $destinationPath . $homePage->banner_logo_image;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $bannerLogo);
                $homePage->banner_logo_image = $bannerLogo;
            }

            // Banner Image
            if ($request->hasFile('banner_image')) {
                $file = $request->file('banner_image');
                $banner = 'banner_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($homePage->banner_image)) {
                    $oldFilePath = $destinationPath . $homePage->banner_image;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $banner);
                $homePage->banner_image = $banner;
            }

            // Feature Icon one
            if ($request->hasFile('f_icon_one')) {
                $file = $request->file('f_icon_one');
                $fIcon = 'fIconone_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($homePage->f_icon_one)) {
                    $oldFilePath = $destinationPath . $homePage->f_icon_one;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $fIcon);
                $homePage->f_icon_one = $fIcon;
            }

            // Feature Icon two
            if ($request->hasFile('f_icon_two')) {
                $file = $request->file('f_icon_two');
                $fIcon = 'fIcontwo_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($homePage->f_icon_two)) {
                    $oldFilePath = $destinationPath . $homePage->f_icon_two;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $fIcon);
                $homePage->f_icon_two = $fIcon;
            }

            // Feature Icon three
            if ($request->hasFile('f_icon_three')) {
                $file = $request->file('f_icon_three');
                $fIcon = 'fIconthree_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($homePage->f_icon_three)) {
                    $oldFilePath = $destinationPath . $homePage->f_icon_three;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $fIcon);
                $homePage->f_icon_three = $fIcon;
            }

            // Feature Icon four
            if ($request->hasFile('f_icon_four')) {
                $file = $request->file('f_icon_four');
                $fIcon = 'fIconfour_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($homePage->f_icon_four)) {
                    $oldFilePath = $destinationPath . $homePage->f_icon_four;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $fIcon);
                $homePage->f_icon_four = $fIcon;
            }

            $homePage->save();

            DB::commit();

            return back()->with('success', 'Page Content Updated');
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
