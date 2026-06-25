<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    private $storagePath;
    public function __construct()
    {
        $this->storagePath = public_path('storage/images/partners/');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::orderByDesc('id')->get()->map(function ($p) {
            $p->partner_image = $p->partner_image ? asset('storage/images/partners/' . $p->partner_image) : '';
            return $p;
        });
        return view('admin.partners.list', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'partner_image' => 'required|image',
            'website_url'    => 'nullable',
        ]);

        DB::beginTransaction();
        try {
            $partner = new Partner();
            $partner->partner_name = $request->partner_name;
            $partner->website_url = $request->website_url;
            $partner->status = $request->status;

            // /** Upload Path */
            if (!file_exists($this->storagePath)) {
                mkdir($this->storagePath, 0777, true);
            }

            // Banner Logo
            if ($request->hasFile('partner_image')) {
                $file = $request->file('partner_image');
                $pImage = 'partner_' . time() . '_' . $file->getClientOriginalName();

                $file->move($this->storagePath, $pImage);
                $partner->partner_image = $pImage;
            }

            $partner->save();
            DB::commit();

            return redirect()->route('admin.partners.index')->with('success', 'Partner added successfully');
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
        $partner = Partner::find($id);
        if ($partner) {
            $partner->partner_image = $partner->partner_image ? asset('storage/images/partners/' . $partner->partner_image) : '';
        }

        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'partner_image' => 'required|image',
            'website_url'    => 'nullable',
        ]);

        DB::beginTransaction();
        try {
            $partner = Partner::find($id);
            $partner->partner_name = $request->partner_name;
            $partner->website_url = $request->website_url;
            $partner->status = $request->status;

            // /** Upload Path */
            if (!file_exists($this->storagePath)) {
                mkdir($this->storagePath, 0777, true);
            }

            // Banner Logo
            if ($request->hasFile('partner_image')) {
                $file = $request->file('partner_image');
                $pImage = 'partner_' . time() . '_' . $file->getClientOriginalName();

                if (!empty($partner->partner_image)) {
                    $oldFilePath = $this->storagePath . $partner->partner_image;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $file->move($this->storagePath, $pImage);
                $partner->partner_image = $pImage;
            }

            $partner->save();
            DB::commit();

            return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Error: ' . $th->getMessage());
        }
    }

    public function updatePartnerStatus(Request $request, $id)
    {
        try {
            $partner = Partner::find($id);
            $partner->status = $request->status;
            $partner->save();
            DB::commit();

            return response()->json(['status' => true, 'message' => 'Partner status updated successfully']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error: ' . $th->getMessage()]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $p = Partner::find($id);
            if (!empty($p->partner_image)) {
                $oldFilePath = $this->storagePath . $p->partner_image;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $p->delete();

            return back()->with('success', 'Partner updated successfully');
        } catch (\Throwable $th) {
            return back()->with('error', 'Error: ' . $th->getMessage());
        }
    }
}
