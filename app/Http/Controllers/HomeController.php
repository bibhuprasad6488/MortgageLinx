<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\BecomeAnIntroducer;
use App\Models\BecomeAnIntroducerForm;
use App\Models\CmsHomePage;
use App\Models\ContactForm;
use App\Models\Introducer;
use App\Models\IntroducerType;
use App\Models\OurProcess;
use App\Models\Partner;
use App\Models\PrivacyPolicy;
use App\Models\Protection;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\SiteSetting;
use App\Models\TermsCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
        $setting = SiteSetting::find(1);
        $serviceCats = ServiceCategory::with('services')->orderBy('id')->where('show_on_home', 1)->get()->map(function ($c) {
            $c->cat_image = $c->cat_image ? asset('storage/images/service_category/' . $c->cat_image) : asset('admin/img/no-img.png');
            return $c;
        });
        $partners = Partner::orderBy('id')->where('status', 1)->get()->map(function ($p) {
            $p->partner_image = $p->partner_image ? asset('storage/images/partners/' . $p->partner_image) : asset('admin/img/no-img.png');
            return $p;
        });
        // dd($serviceCats);
        return view('home', compact('homePage', 'setting', 'serviceCats', 'partners'));
    }

    public function contactPage()
    {
        $setting = SiteSetting::find(1);
        return view('contact', compact('setting'));
    }

    public function contactFormStore(Request $request)
    {
        DB::beginTransaction();
        try {
            $cForm = new ContactForm();
            $cForm->full_name = $request->full_name;
            $cForm->email_address = $request->email_address;
            $cForm->phone_number = $request->phone_number;
            $cForm->enquiry_type = $request->enquiry_type;
            $cForm->your_subject = $request->your_subject;
            $cForm->your_messsage = $request->your_messsage;
            $cForm->terms_conditions = $request->terms_conditions;
            $cForm->save();
            DB::commit();

            return redirect()->back()->with('success', 'Your message has been submitted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error: ' . $th->getMessage());
        }
    }

    public function introducerPage()
    {
        $partners = Partner::orderBy('id')->where('status', 1)->get()->map(function ($p) {
            $p->partner_image = $p->partner_image ? asset('storage/images/partners/' . $p->partner_image) : '';
            return $p;
        });
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
        return view('introducer', compact('partners', 'introducer', 'intTypes'));
    }

    public function becomeAnIntroducer()
    {
        $partners = Partner::orderBy('id')->where('status', 1)->get()->map(function ($p) {
            $p->partner_image = $p->partner_image ? asset('storage/images/partners/' . $p->partner_image) : '';
            return $p;
        });

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

        $intTypes = IntroducerType::orderBy('id')->get()->map(function ($int) {
            $int->icon = $int->icon ? asset('storage/images/cmspage/' . $int->icon) : '';
            return $int;
        });

        $setting = SiteSetting::find(1);

        return view('introducer_details', compact('partners', 'intDetails', 'intTypes', 'setting'));
    }

    public function becomeAnIntroducerStore(Request $request)
    {
        DB::beginTransaction();
        try {
            $bcai = new BecomeAnIntroducerForm();
            $bcai->business_name = $request->business_name;
            $bcai->trading_name = $request->trading_name;
            $bcai->role = $request->role;
            $bcai->range = $request->range ? implode(', ', $request->range) : '';
            $bcai->contact_name = $request->contact_name;
            $bcai->contact_email = $request->contact_email;
            $bcai->contact_phone = $request->contact_phone;
            $bcai->contact_method = $request->contact_method;

            $bcai->save();
            DB::commit();
            return redirect()->route('become-an-introducer')->with('success', 'Your form has been submitted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('become-an-introducer')->with('error', 'Error: ' . $th->getMessage());
        }
    }

    public function protectionPage()
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
        $pCategory = ServiceCategory::where('slug', 'protection')->first();
        $protectionServices = Service::where('category_id', $pCategory->id)->limit(5)->get()->map(function ($s) {
            $s->service_image = $s->service_image ? asset('storage/images/services/' . $s->service_image) : '';
            $s->thumb_image = $s->thumb_image ? asset('storage/images/services/' . $s->thumb_image) : asset('images/icon24.png');
            return $s;
        });
        $partners = Partner::orderBy('id')->where('status', 1)->get()->map(function ($p) {
            $p->partner_image = $p->partner_image ? asset('storage/images/partners/' . $p->partner_image) : asset('admin/img/no-img.png');
            return $p;
        });
        return view('protection', compact('partners', 'protection', 'protectionServices'));
    }

    public function allServices()
    {
        $serviceCats = ServiceCategory::with('services')->orderBy('id')->get()->map(function ($c) {
            $c->cat_image = $c->cat_image ? asset('storage/images/service_category/' . $c->cat_image) : asset('admin/img/no-img.png');
            return $c;
        });
        $partners = Partner::orderBy('id')->where('status', 1)->get()->map(function ($p) {
            $p->partner_image = $p->partner_image ? asset('storage/images/partners/' . $p->partner_image) : asset('admin/img/no-img.png');
            return $p;
        });
        return view('all_categories', compact('serviceCats', 'partners'));
    }

    public function serviceSinglePage($slug)
    {
        $serviceCat = ServiceCategory::where('slug', $slug)->first();
        $serviceCat->cat_image = $serviceCat->cat_image ? asset('storage/images/service_category/' . $serviceCat->cat_image) : '';
        $services = Service::where('category_id', $serviceCat->id)->get()->map(function ($s) {
            $s->service_image = $s->service_image ? asset('storage/images/services/' . $s->service_image) : asset('admin/img/no-img.png');
            $s->thumb_image = $s->thumb_image ? asset('storage/images/services/' . $s->thumb_image) : asset('images/icon24.png');
            return $s;
        });
        $partners = Partner::orderBy('id')->where('status', 1)->get()->map(function ($p) {
            $p->partner_image = $p->partner_image ? asset('storage/images/partners/' . $p->partner_image) : asset('admin/img/no-img.png');
            return $p;
        });

        return view('single_category', compact('serviceCat', 'services', 'partners'));
    }

    public function serviceDetails($slug)
    {
        $service = Service::where('slug', $slug)->first();
        $serviceCat = ServiceCategory::find($service->category_id);
        $service->service_image = $service->service_image ? asset('storage/images/services/' . $service->service_image) : '';
        $service->thumb_image = $service->thumb_image ? asset('storage/images/services/' . $service->thumb_image) : '';

        $partners = Partner::orderBy('id')->where('status', 1)->get()->map(function ($p) {
            $p->partner_image = $p->partner_image ? asset('storage/images/partners/' . $p->partner_image) : asset('admin/img/no-img.png');
            return $p;
        });

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
        if ($serviceCat->slug == 'protection') {
            return view('protection_details', compact('service', 'partners', 'protection', 'serviceCat'));
        } else {
            return view('service_details', compact('service', 'partners', 'serviceCat'));
        }
    }

    public function privacyPage()
    {
        $privacy = PrivacyPolicy::find(1);
        return view('privacy', compact('privacy'));
    }


    /**
     * Display the specified resource.
     */
    public function termsPage()
    {
        $terms = TermsCondition::find(1);
        return view('terms', compact('terms'));
    }

    public function about()
    {
        $setting = SiteSetting::find(1);
        $aboutUs = AboutUs::find(1);
        if ($aboutUs) {
            $aboutUs->banner_image = $aboutUs->banner_image ? asset('storage/images/cmspage/' . $aboutUs->banner_image) : '';
            $aboutUs->story_right_image = $aboutUs->story_right_image ? asset('storage/images/cmspage/' . $aboutUs->story_right_image) : '';
        }
        return view('about', compact('setting', 'aboutUs'));
    }

    public function process()
    {
        $process = OurProcess::find(1);
        if ($process) {
            $process->banner_image = $process->banner_image ? asset('storage/images/cmspage/' . $process->banner_image) : '';
            $process->wccu_image = $process->wccu_image ? asset('storage/images/cmspage/' . $process->wccu_image) : '';
            $process->wccu_content = $process->wccu_content ? explode('/', trim($process->wccu_content)) : [];
        }
        // dd($process->wccu_content);
        return view('process', compact('process'));
    }
}
