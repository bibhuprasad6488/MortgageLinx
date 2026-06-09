<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CmsContactPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactPage = ContactUsPage::find(1);
        if ($contactPage) {
            $contactPage->banner_image = $contactPage->banner_image ? asset('storage/images/cmspage/' . $contactPage->banner_image) : '';
            $contactPage->wccml_icon_one = $contactPage->wccml_icon_one ? asset('storage/images/cmspage/' . $contactPage->wccml_icon_one) : '';
            $contactPage->wccml_icon_two = $contactPage->wccml_icon_two ? asset('storage/images/cmspage/' . $contactPage->wccml_icon_two) : '';
            $contactPage->wccml_icon_three = $contactPage->wccml_icon_three ? asset('storage/images/cmspage/' . $contactPage->wccml_icon_three) : '';
            $contactPage->wccml_icon_four = $contactPage->wccml_icon_four ? asset('storage/images/cmspage/' . $contactPage->wccml_icon_four) : '';
            $contactPage->wccml_icon_five = $contactPage->wccml_icon_five ? asset('storage/images/cmspage/' . $contactPage->wccml_icon_five) : '';
        }
        return view('admin.cmspages.contactus', compact('contactPage'));
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
            $contactPage = ContactUsPage::find(1) ?? new ContactUsPage();
            $contactPage->banner_title = $request->banner_title;
            $contactPage->banner_sub_title = $request->banner_sub_title;
            $contactPage->banner_desc = $request->banner_desc;
            $contactPage->banner_btn_text = $request->banner_btn_text;
            $contactPage->wccml_title_one = $request->wccml_title_one;
            $contactPage->wccml_subtitle_one = $request->wccml_subtitle_one;
            $contactPage->wccml_title_two = $request->wccml_title_two;
            $contactPage->wccml_subtitle_two = $request->wccml_subtitle_two;
            $contactPage->wccml_title_three = $request->wccml_title_three;
            $contactPage->wccml_subtitle_three = $request->wccml_subtitle_three;
            $contactPage->wccml_title_four = $request->wccml_title_four;
            $contactPage->wccml_subtitle_four = $request->wccml_subtitle_four;
            $contactPage->wccml_title_five = $request->wccml_title_five;
            $contactPage->wccml_subtitle_five = $request->wccml_subtitle_five;
            $contactPage->meta_title = $request->meta_title;
            $contactPage->meta_desc = $request->meta_desc;
            $contactPage->meta_keywords = $request->meta_keywords;

            // /** Upload Path */
            $destinationPath = public_path('storage/images/cmspage/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Banner Image
            if ($request->hasFile('banner_image')) {
                $file = $request->file('banner_image');
                $banner = 'contact_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($contactPage->banner_image)) {
                    $oldFilePath = $destinationPath . $contactPage->banner_image;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $banner);
                $contactPage->banner_image = $banner;
            }

            // Icon one
            if ($request->hasFile('wccml_icon_one')) {
                $file = $request->file('wccml_icon_one');
                $leftImage = 'icon_one_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($contactPage->wccml_icon_one)) {
                    $oldFilePath = $destinationPath . $contactPage->wccml_icon_one;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $leftImage);
                $contactPage->wccml_icon_one = $leftImage;
            }

            // Icon two
            if ($request->hasFile('wccml_icon_two')) {
                $file = $request->file('wccml_icon_two');
                $leftImage = 'icon_two_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($contactPage->wccml_icon_two)) {
                    $oldFilePath = $destinationPath . $contactPage->wccml_icon_two;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $leftImage);
                $contactPage->wccml_icon_two = $leftImage;
            }

            // Icon three
            if ($request->hasFile('wccml_icon_three')) {
                $file = $request->file('wccml_icon_three');
                $leftImage = 'icon_three_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($contactPage->wccml_icon_three)) {
                    $oldFilePath = $destinationPath . $contactPage->wccml_icon_three;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $leftImage);
                $contactPage->wccml_icon_three = $leftImage;
            }

            // Icon four
            if ($request->hasFile('wccml_icon_four')) {
                $file = $request->file('wccml_icon_four');
                $leftImage = 'icon_four_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($contactPage->wccml_icon_four)) {
                    $oldFilePath = $destinationPath . $contactPage->wccml_icon_four;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $leftImage);
                $contactPage->wccml_icon_four = $leftImage;
            }

            // Icon five
            if ($request->hasFile('wccml_icon_five')) {
                $file = $request->file('wccml_icon_five');
                $leftImage = 'icon_five_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($contactPage->wccml_icon_five)) {
                    $oldFilePath = $destinationPath . $contactPage->wccml_icon_five;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($destinationPath, $leftImage);
                $contactPage->wccml_icon_five = $leftImage;
            }

            $contactPage->save();

            DB::commit();
            return redirect()->back()->with('success', 'Contact Us page updated successfully.');
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
