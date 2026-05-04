<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Protection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProtectionPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $protection = Protection::find(1);

        if ($protection) {
            $protection->banner_image = $protection->banner_image
                ? asset('storage/images/cmspage/' . $protection->banner_image)
                : '';

            $protection->wgpw_image = $protection->wgpw_image
                ? asset('storage/images/cmspage/' . $protection->wgpw_image)
                : '';

            $protection->bnr_icon_one = $protection->bnr_icon_one
                ? asset('storage/images/cmspage/' . $protection->bnr_icon_one)
                : '';

            $protection->bnr_icon_two = $protection->bnr_icon_two
                ? asset('storage/images/cmspage/' . $protection->bnr_icon_two)
                : '';

            $protection->bnr_icon_three = $protection->bnr_icon_three
                ? asset('storage/images/cmspage/' . $protection->bnr_icon_three)
                : '';

            $protection->bnr_icon_four = $protection->bnr_icon_four
                ? asset('storage/images/cmspage/' . $protection->bnr_icon_four)
                : '';

            $protection->sp_icon_one = $protection->sp_icon_one
                ? asset('storage/images/cmspage/' . $protection->sp_icon_one)
                : '';

            $protection->sp_icon_two = $protection->sp_icon_two
                ? asset('storage/images/cmspage/' . $protection->sp_icon_two)
                : '';

            $protection->sp_icon_three = $protection->sp_icon_three
                ? asset('storage/images/cmspage/' . $protection->sp_icon_three)
                : '';

            $protection->sp_icon_four = $protection->sp_icon_four
                ? asset('storage/images/cmspage/' . $protection->sp_icon_four)
                : '';
        }

        return view('admin.cmspages.protectionpage', compact('protection'));
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
        $request->validate([
            'banner_title' => 'required|string|max:255',
        ]);
        DB::beginTransaction();
        try {
            $p = Protection::find(1) ?? new Protection();
            $p->banner_title = $request->banner_title;
            $p->banner_sub_title = $request->banner_sub_title;
            $p->banner_desc = $request->banner_desc;
            $p->banner_btn_text = $request->banner_btn_text;
            $p->banner_btn_link = $request->banner_btn_link;
            $p->wgpw_content = $request->wgpw_content;
            $p->sp_title_one = $request->sp_title_one;
            $p->sp_subtitle_one = $request->sp_subtitle_one;
            $p->sp_title_two = $request->sp_title_two;
            $p->sp_subtitle_two = $request->sp_subtitle_two;
            $p->sp_title_three = $request->sp_title_three;
            $p->sp_subtitle_three = $request->sp_subtitle_three;
            $p->sp_title_four = $request->sp_title_four;
            $p->sp_subtitle_four = $request->sp_subtitle_four;
            $p->bnr_title_one = $request->bnr_title_one;
            $p->bnr_subtitle_one = $request->bnr_subtitle_one;
            $p->bnr_title_two = $request->bnr_title_two;
            $p->bnr_subtitle_two = $request->bnr_subtitle_two;
            $p->bnr_title_three = $request->bnr_title_three;
            $p->bnr_subtitle_three = $request->bnr_subtitle_three;
            $p->bnr_title_four = $request->bnr_title_four;
            $p->bnr_subtitle_four = $request->bnr_subtitle_four;
            $p->meta_title = $request->meta_title;
            $p->meta_desc = $request->meta_desc;
            $p->meta_keywords = $request->meta_keywords;

            // /** Upload Path */
            $destinationPath = public_path('storage/images/cmspage/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Banner Image
            if ($request->hasFile('banner_image')) {
                $file = $request->file('banner_image');
                $banner = 'bannerImg_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($p->banner_image)) {
                    $oldFilePath = $destinationPath . $p->banner_image;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $banner);
                $p->banner_image = $banner;
            }


            // Feature Icon one
            if ($request->hasFile('bnr_icon_one')) {
                $file = $request->file('bnr_icon_one');
                $bnrIcon = 'bnrIconone_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($p->bnr_icon_one)) {
                    $oldFilePath = $destinationPath . $p->bnr_icon_one;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $bnrIcon);
                $p->bnr_icon_one = $bnrIcon;
            }

            // Feature Icon two
            if ($request->hasFile('bnr_icon_two')) {
                $file = $request->file('bnr_icon_two');
                $bnrIcon = 'bnrIcontwo_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($p->bnr_icon_two)) {
                    $oldFilePath = $destinationPath . $p->bnr_icon_two;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $bnrIcon);
                $p->bnr_icon_two = $bnrIcon;
            }

            // Feature Icon three
            if ($request->hasFile('bnr_icon_three')) {
                $file = $request->file('bnr_icon_three');
                $bnrIcon = 'bnrIconthree_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($p->bnr_icon_three)) {
                    $oldFilePath = $destinationPath . $p->bnr_icon_three;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $bnrIcon);
                $p->bnr_icon_three = $bnrIcon;
            }

            // Feature Icon four
            if ($request->hasFile('bnr_icon_four')) {
                $file = $request->file('bnr_icon_four');
                $bnrIcon = 'bnrIconfour_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($p->bnr_icon_four)) {
                    $oldFilePath = $destinationPath . $p->bnr_icon_four;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $bnrIcon);
                $p->bnr_icon_four = $bnrIcon;
            }

            //  Image
            if ($request->hasFile('wgpw_image')) {
                $file = $request->file('wgpw_image');
                $wpwuImage = 'wgpwImg_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($p->wgpw_image)) {
                    $oldFilePath = $destinationPath . $p->wgpw_image;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $wpwuImage);
                $p->wgpw_image = $wpwuImage;
            }

            // Feature Icon one
            if ($request->hasFile('sp_icon_one')) {
                $file = $request->file('sp_icon_one');
                $spIcon = 'spIconone_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($p->sp_icon_one)) {
                    $oldFilePath = $destinationPath . $p->sp_icon_one;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $spIcon);
                $p->sp_icon_one = $spIcon;
            }

            // Feature Icon two
            if ($request->hasFile('sp_icon_two')) {
                $file = $request->file('sp_icon_two');
                $spIcon = 'spIcontwo_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($p->sp_icon_two)) {
                    $oldFilePath = $destinationPath . $p->sp_icon_two;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $spIcon);
                $p->sp_icon_two = $spIcon;
            }

            // Feature Icon three
            if ($request->hasFile('sp_icon_three')) {
                $file = $request->file('sp_icon_three');
                $spIcon = 'spIconthree_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($p->sp_icon_three)) {
                    $oldFilePath = $destinationPath . $p->sp_icon_three;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $spIcon);
                $p->sp_icon_three = $spIcon;
            }

            // Feature Icon four
            if ($request->hasFile('sp_icon_four')) {
                $file = $request->file('sp_icon_four');
                $spIcon = 'spIconfour_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($p->sp_icon_four)) {
                    $oldFilePath = $destinationPath . $p->sp_icon_four;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $spIcon);
                $p->sp_icon_four = $spIcon;
            }

            $p->save();

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
