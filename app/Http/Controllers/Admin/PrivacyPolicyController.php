<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $privacy = PrivacyPolicy::find(1);
        return view('admin.cmspages.privacypolicy', compact('privacy'));
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
            $privacy = PrivacyPolicy::find(1) ?? new PrivacyPolicy();
            $privacy->content = $request->content ? preg_replace('/[^\x20-\x7E]/u', '', $request->content) : '';
            $privacy->save();
            DB::commit();
            return back()->with('success', 'Content Saved Succefully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Content Save failed Error: ' . $th->getMessage());
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
