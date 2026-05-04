<?php

namespace App\Http\Controllers;

use App\Models\CmsHomePage;
use App\Models\Introducer;
use App\Models\IntroducerType;
use App\Models\Partner;
use App\Models\PrivacyPolicy;
use App\Models\Protection;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\SiteSetting;
use App\Models\TermsCondition;
use Illuminate\Http\Request;

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
        return view('contact');
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

        $partners = Partner::orderBy('id')->where('status', 1)->get()->map(function ($p) {
            $p->partner_image = $p->partner_image ? asset('storage/images/partners/' . $p->partner_image) : asset('admin/img/no-img.png');
            return $p;
        });
        return view('protection', compact('partners', 'protection'));
    }

    public function allServices()
    {
        $serviceCats = ServiceCategory::with('services')->orderBy('id')->get()->map(function ($c) {
            $c->cat_image = $c->cat_image ? asset('storage/images/service_category/' . $c->cat_image) : asset('admin/img/no-img.png');
            return $c;
        });
        return view('all_categories', compact('serviceCats'));
    }

    public function serviceSinglePage($slug)
    {
        $serviceCat = ServiceCategory::where('slug', $slug)->first();
        $serviceCat->cat_image = $serviceCat->cat_image ? asset('storage/images/service_category/' . $serviceCat->cat_image) : '';
        $services = Service::where('category_id', $serviceCat->id)->get()->map(function ($s) {
            $s->service_image = $s->service_image ? asset('storage/images/services/' . $s->service_image) : asset('admin/img/no-img.png');
            return $s;
        });

        return view('single_category', compact('serviceCat', 'services'));
    }

    public function serviceDetails($slug)
    {
        $service = Service::where('slug', $slug)->first();
        $service->service_image = $service->service_image ? asset('storage/images/services/' . $service->service_image) : '';

        return view('service_details', compact('service'));
    }

    public function privacyPage()
    {
        $privacy = PrivacyPolicy::find(1);
        return view('privacy', compact('privacy'));
    }


    /**
     * Display the specified resource.
     */
    public function termsPage(string $id)
    {
        $terms = TermsCondition::find(1);
        return view('terms', compact('terms'));
    }
}
