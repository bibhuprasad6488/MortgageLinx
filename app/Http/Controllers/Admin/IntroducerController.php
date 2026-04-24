<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Introducer;
use App\Models\IntroducerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IntroducerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $introducer = Introducer::find(1);

        if ($introducer) {
            $introducer->banner_image = $introducer->banner_image
                ? asset('storage/images/cmspage/' . $introducer->banner_image)
                : '';

            $introducer->wpwu_image = $introducer->wpwu_image
                ? asset('storage/images/cmspage/' . $introducer->wpwu_image)
                : '';

            $introducer->hw_icon_one = $introducer->hw_icon_one
                ? asset('storage/images/cmspage/' . $introducer->hw_icon_one)
                : '';

            $introducer->hw_icon_two = $introducer->hw_icon_two
                ? asset('storage/images/cmspage/' . $introducer->hw_icon_two)
                : '';

            $introducer->hw_icon_three = $introducer->hw_icon_three
                ? asset('storage/images/cmspage/' . $introducer->hw_icon_three)
                : '';

            $introducer->hw_icon_four = $introducer->hw_icon_four
                ? asset('storage/images/cmspage/' . $introducer->hw_icon_four)
                : '';
        }

        $intTypes = IntroducerType::orderBy('id')->get()->map(function ($int) {
            $int->icon = $int->icon ? asset('storage/images/cmspage/' . $int->icon) : '';
            return $int;
        });
        return view('admin.cmspages.becomeintroducer', compact('introducer', 'intTypes'));
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
            $introducer = Introducer::find(1) ?? new Introducer();
            $introducer->banner_title = $request->banner_title;
            $introducer->banner_sub_title = $request->banner_sub_title;
            $introducer->banner_desc = $request->banner_desc;
            $introducer->banner_btn_text = $request->banner_btn_text;
            $introducer->banner_btn_link = $request->banner_btn_link;
            $introducer->wpwu_content = $request->wpwu_content;
            $introducer->hw_title_one = $request->hw_title_one;
            $introducer->hw_subtitle_one = $request->hw_subtitle_one;
            $introducer->hw_title_two = $request->hw_title_two;
            $introducer->hw_subtitle_two = $request->hw_subtitle_two;
            $introducer->hw_title_three = $request->hw_title_three;
            $introducer->hw_subtitle_three = $request->hw_subtitle_three;
            $introducer->hw_title_four = $request->hw_title_four;
            $introducer->hw_subtitle_four = $request->hw_subtitle_four;
            $introducer->meta_title = $request->meta_title;
            $introducer->meta_desc = $request->meta_desc;
            $introducer->meta_keywords = $request->meta_keywords;

            // /** Upload Path */
            $destinationPath = public_path('storage/images/cmspage/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Banner Image
            if ($request->hasFile('banner_image')) {
                $file = $request->file('banner_image');
                $banner = 'bannerImg_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($introducer->banner_image)) {
                    $oldFilePath = $destinationPath . $introducer->banner_image;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $banner);
                $introducer->banner_image = $banner;
            }

            //  Image
            if ($request->hasFile('wpwu_image')) {
                $file = $request->file('wpwu_image');
                $wpwuImage = 'wpwuImg_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($introducer->wpwu_image)) {
                    $oldFilePath = $destinationPath . $introducer->wpwu_image;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $wpwuImage);
                $introducer->wpwu_image = $wpwuImage;
            }

            // Feature Icon one
            if ($request->hasFile('hw_icon_one')) {
                $file = $request->file('hw_icon_one');
                $hwIcon = 'hwIconone_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($introducer->hw_icon_one)) {
                    $oldFilePath = $destinationPath . $introducer->hw_icon_one;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $hwIcon);
                $introducer->hw_icon_one = $hwIcon;
            }

            // Feature Icon two
            if ($request->hasFile('hw_icon_two')) {
                $file = $request->file('hw_icon_two');
                $hwIcon = 'hwIcontwo_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($introducer->hw_icon_two)) {
                    $oldFilePath = $destinationPath . $introducer->hw_icon_two;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $hwIcon);
                $introducer->hw_icon_two = $hwIcon;
            }

            // Feature Icon three
            if ($request->hasFile('hw_icon_three')) {
                $file = $request->file('hw_icon_three');
                $hwIcon = 'hwIconthree_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($introducer->hw_icon_three)) {
                    $oldFilePath = $destinationPath . $introducer->hw_icon_three;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $hwIcon);
                $introducer->hw_icon_three = $hwIcon;
            }

            // Feature Icon four
            if ($request->hasFile('hw_icon_four')) {
                $file = $request->file('hw_icon_four');
                $hwIcon = 'hwIconfour_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($introducer->hw_icon_four)) {
                    $oldFilePath = $destinationPath . $introducer->hw_icon_four;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $hwIcon);
                $introducer->hw_icon_four = $hwIcon;
            }

            $introducer->save();

            DB::commit();

            return back()->with('success', 'Page Content Updated');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Error: ' . $th->getMessage());
        }
    }

    public function storeIntTypes(Request $request)
    {
        $request->validate(['title' => 'required']);

        DB::beginTransaction();
        try {
            $intType = new IntroducerType();
            $intType->title = $request->title;
            // /** Upload Path */
            $destinationPath = public_path('storage/images/cmspage/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Banner Image
            if ($request->hasFile('icon')) {
                $file = $request->file('icon');
                $banner = 'iconImg_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($intType->icon)) {
                    $oldFilePath = $destinationPath . $intType->icon;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $banner);
                $intType->icon = $banner;
            }

            $intType->save();

            DB::commit();
            return redirect()->back()->with('success', 'Data Added successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $intType = IntroducerType::find($id);
            $destinationPath = public_path('storage/images/cmspage/');
            if (!empty($intType->icon)) {
                $oldFilePath = $destinationPath . $intType->icon;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $intType->delete();
            return back()->with('success', 'Data deleted');
        } catch (\Throwable $th) {
            return back()->with('error', 'Error: ' . $th->getMessage());
        }
    }
}
