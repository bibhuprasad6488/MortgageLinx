<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BecomeAnIntroducerForm;
use App\Models\ContactForm;
use App\Models\Partner;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactForms = ContactForm::all();
        $introducerForms = BecomeAnIntroducerForm::all();
        $partners = Partner::all();
        $services = Service::all();
        return view('admin.dashboard', compact('contactForms', 'introducerForms', 'partners', 'services'));
    }

    public function contactFormList()
    {
        $contactForms = ContactForm::orderBy('created_at', 'desc')->get();
        return view('admin.contact_form', compact('contactForms'));
    }
}
