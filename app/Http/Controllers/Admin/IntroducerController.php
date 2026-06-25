<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BecomeAnIntroducer;
use App\Models\BecomeAnIntroducerForm;
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

    public function introducerDetails()
    {
        $intDetails = BecomeAnIntroducer::find(1);

        if ($intDetails) {
            $intDetails->banner_image = $intDetails->banner_image
                ? asset('storage/images/cmspage/' . $intDetails->banner_image)
                : '';

            $intDetails->wpwm_icon_one = $intDetails->wpwm_icon_one
                ? asset('storage/images/cmspage/' . $intDetails->wpwm_icon_one)
                : '';

            $intDetails->wpwm_icon_two = $intDetails->wpwm_icon_two
                ? asset('storage/images/cmspage/' . $intDetails->wpwm_icon_two)
                : '';

            $intDetails->wpwm_icon_three = $intDetails->wpwm_icon_three
                ? asset('storage/images/cmspage/' . $intDetails->wpwm_icon_three)
                : '';

            $intDetails->wpwm_icon_four = $intDetails->wpwm_icon_four
                ? asset('storage/images/cmspage/' . $intDetails->wpwm_icon_four)
                : '';

            $intDetails->wpwm_icon_five = $intDetails->wpwm_icon_five
                ? asset('storage/images/cmspage/' . $intDetails->wpwm_icon_five)
                : '';

            $intDetails->sp_icon_one = $intDetails->sp_icon_one
                ? asset('storage/images/cmspage/' . $intDetails->sp_icon_one)
                : '';

            $intDetails->sp_icon_two = $intDetails->sp_icon_two
                ? asset('storage/images/cmspage/' . $intDetails->sp_icon_two)
                : '';

            $intDetails->sp_icon_three = $intDetails->sp_icon_three
                ? asset('storage/images/cmspage/' . $intDetails->sp_icon_three)
                : '';

            $intDetails->sp_icon_four = $intDetails->sp_icon_four
                ? asset('storage/images/cmspage/' . $intDetails->sp_icon_four)
                : '';

            $intDetails->sp_icon_five = $intDetails->sp_icon_five
                ? asset('storage/images/cmspage/' . $intDetails->sp_icon_five)
                : '';
        }
        return view('admin.cmspages.introducerdetails', compact('intDetails'));
    }

    public function introducerDetailsStore(Request $request)
    {
        $request->validate([
            'banner_title' => 'required|string|max:255',
        ]);
        DB::beginTransaction();
        try {
            $intDetails = BecomeAnIntroducer::find(1) ?? new BecomeAnIntroducer();
            $intDetails->banner_title = $request->banner_title;
            $intDetails->banner_sub_title = $request->banner_sub_title;
            $intDetails->banner_desc = $request->banner_desc;
            $intDetails->banner_btn_text = $request->banner_btn_text;
            $intDetails->banner_btn_link = $request->banner_btn_link;
            $intDetails->sp_title_one = $request->sp_title_one;
            $intDetails->sp_subtitle_one = $request->sp_subtitle_one;
            $intDetails->sp_title_two = $request->sp_title_two;
            $intDetails->sp_subtitle_two = $request->sp_subtitle_two;
            $intDetails->sp_title_three = $request->sp_title_three;
            $intDetails->sp_subtitle_three = $request->sp_subtitle_three;
            $intDetails->sp_title_four = $request->sp_title_four;
            $intDetails->sp_subtitle_four = $request->sp_subtitle_four;
            $intDetails->sp_title_five = $request->sp_title_five;
            $intDetails->sp_subtitle_five = $request->sp_subtitle_five;
            $intDetails->wpwm_title_one = $request->wpwm_title_one;
            $intDetails->wpwm_subtitle_one = $request->wpwm_subtitle_one;
            $intDetails->wpwm_title_two = $request->wpwm_title_two;
            $intDetails->wpwm_subtitle_two = $request->wpwm_subtitle_two;
            $intDetails->wpwm_title_three = $request->wpwm_title_three;
            $intDetails->wpwm_subtitle_three = $request->wpwm_subtitle_three;
            $intDetails->wpwm_title_four = $request->wpwm_title_four;
            $intDetails->wpwm_subtitle_four = $request->wpwm_subtitle_four;
            $intDetails->wpwm_title_five = $request->wpwm_title_five;
            $intDetails->wpwm_subtitle_five = $request->wpwm_subtitle_five;
            $intDetails->meta_title = $request->meta_title;
            $intDetails->meta_desc = $request->meta_desc;
            $intDetails->meta_keywords = $request->meta_keywords;

            // /** Upload Path */
            $destinationPath = public_path('storage/images/cmspage/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Banner Image
            if ($request->hasFile('banner_image')) {
                $file = $request->file('banner_image');
                $banner = 'bannerImg_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($intDetails->banner_image)) {
                    $oldFilePath = $destinationPath . $intDetails->banner_image;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $banner);
                $intDetails->banner_image = $banner;
            }


            // Feature Icon one
            if ($request->hasFile('wpwm_icon_one')) {
                $file = $request->file('wpwm_icon_one');
                $wpwmIcon = 'wpwmIconone_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($intDetails->wpwm_icon_one)) {
                    $oldFilePath = $destinationPath . $intDetails->wpwm_icon_one;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $wpwmIcon);
                $intDetails->wpwm_icon_one = $wpwmIcon;
            }

            // Feature Icon two
            if ($request->hasFile('wpwm_icon_two')) {
                $file = $request->file('wpwm_icon_two');
                $wpwmIcon = 'wpwmIcontwo_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($intDetails->wpwm_icon_two)) {
                    $oldFilePath = $destinationPath . $intDetails->wpwm_icon_two;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $wpwmIcon);
                $intDetails->wpwm_icon_two = $wpwmIcon;
            }

            // Feature Icon three
            if ($request->hasFile('wpwm_icon_three')) {
                $file = $request->file('wpwm_icon_three');
                $wpwmIcon = 'wpwmIconthree_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($intDetails->wpwm_icon_three)) {
                    $oldFilePath = $destinationPath . $intDetails->wpwm_icon_three;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $wpwmIcon);
                $intDetails->wpwm_icon_three = $wpwmIcon;
            }

            // Feature Icon four
            if ($request->hasFile('wpwm_icon_four')) {
                $file = $request->file('wpwm_icon_four');
                $wpwmIcon = 'wpwmIconfour_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($intDetails->wpwm_icon_four)) {
                    $oldFilePath = $destinationPath . $intDetails->wpwm_icon_four;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $wpwmIcon);
                $intDetails->wpwm_icon_four = $wpwmIcon;
            }

            // Feature Icon five
            if ($request->hasFile('wpwm_icon_five')) {
                $file = $request->file('wpwm_icon_five');
                $wpwmIcon = 'wpwmIconfive_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($intDetails->wpwm_icon_five)) {
                    $oldFilePath = $destinationPath . $intDetails->wpwm_icon_five;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $wpwmIcon);
                $intDetails->wpwm_icon_five = $wpwmIcon;
            }

            // Feature Icon one
            if ($request->hasFile('sp_icon_one')) {
                $file = $request->file('sp_icon_one');
                $spIcon = 'spIconone_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($intDetails->sp_icon_one)) {
                    $oldFilePath = $destinationPath . $intDetails->sp_icon_one;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $spIcon);
                $intDetails->sp_icon_one = $spIcon;
            }

            // Feature Icon two
            if ($request->hasFile('sp_icon_two')) {
                $file = $request->file('sp_icon_two');
                $spIcon = 'spIcontwo_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($intDetails->sp_icon_two)) {
                    $oldFilePath = $destinationPath . $intDetails->sp_icon_two;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $spIcon);
                $intDetails->sp_icon_two = $spIcon;
            }

            // Feature Icon three
            if ($request->hasFile('sp_icon_three')) {
                $file = $request->file('sp_icon_three');
                $spIcon = 'spIconthree_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($intDetails->sp_icon_three)) {
                    $oldFilePath = $destinationPath . $intDetails->sp_icon_three;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $spIcon);
                $intDetails->sp_icon_three = $spIcon;
            }

            // Feature Icon four
            if ($request->hasFile('sp_icon_four')) {
                $file = $request->file('sp_icon_four');
                $spIcon = 'spIconfour_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($intDetails->sp_icon_four)) {
                    $oldFilePath = $destinationPath . $intDetails->sp_icon_four;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $spIcon);
                $intDetails->sp_icon_four = $spIcon;
            }

            // Feature Icon five
            if ($request->hasFile('sp_icon_five')) {
                $file = $request->file('sp_icon_five');
                $spIcon = 'spIconfive_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($intDetails->sp_icon_five)) {
                    $oldFilePath = $destinationPath . $intDetails->sp_icon_five;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $spIcon);
                $intDetails->sp_icon_five = $spIcon;
            }

            $intDetails->save();

            DB::commit();

            return back()->with('success', 'Page Content Updated');
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

    public function introducersList()
    {
        $introducerForms = BecomeAnIntroducerForm::orderBy('created_at', 'desc')->get();
        return view('admin.introducer_list', compact('introducerForms'));
    }
}
