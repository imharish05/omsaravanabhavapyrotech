<?php

namespace App\Http\Controllers;

use App\Models\BannerImage;
use App\Models\OfferBannerImage;
use App\Models\SectionBanner;
use Illuminate\Http\Request;

class BannerController extends Controller {

    // Required banner dimensions
    const BANNER_WIDTH  = 1920;
    const BANNER_HEIGHT = 600;
    const BANNER_TOL    = 5; // ±5px tolerance

    /**
     * Validate uploaded banner image dimensions.
     * Returns an error message string, or null if valid.
     */
    private function validateBannerDimensions($file): ?string
    {
        [$width, $height] = getimagesize($file->getRealPath());
        $minW = self::BANNER_WIDTH  - self::BANNER_TOL;
        $maxW = self::BANNER_WIDTH  + self::BANNER_TOL;
        $minH = self::BANNER_HEIGHT - self::BANNER_TOL;
        $maxH = self::BANNER_HEIGHT + self::BANNER_TOL;

        if ($width < $minW || $width > $maxW || $height < $minH || $height > $maxH) {
            return "❌ Wrong size! Your image is {$width}×{$height}px. "
                 . "Please upload exactly " . self::BANNER_WIDTH . "×" . self::BANNER_HEIGHT . " px (1920×600).";
        }
        return null;
    }

    public function index() {
        $bannerImages    = BannerImage::orderBy('id', 'asc')->get();
        $webbannerImages = SectionBanner::orderBy('id', 'asc')->get();
        return view('pages.banner', compact('bannerImages', 'webbannerImages'));
    }

    // ADD BANNER
    public function addbanner(Request $request) {
        $request->validate([
            'banner_image' => 'nullable|image|mimes:png,jpg,webp,jpeg,gif|max:15360' // 15MB max
        ]);

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');

            // ── Dimension check ──────────────────────────────────────
            $dimError = $this->validateBannerDimensions($file);
            if ($dimError) {
                return response()->json([
                    'status'  => '422',
                    'message' => $dimError,
                ], 422);
            }
            // ─────────────────────────────────────────────────────────

            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/bannerimages'), $filename);
            $path = 'uploads/bannerimages/' . $filename;

            BannerImage::create([
                'banner_image' => $path,
            ]);

            return response()->json([
                'status'  => '200',
                'message' => 'Banner Image Added Successfully',
            ]);
        }

        return redirect('/banner/view')->with('error', 'No Image found');
    }

    // UPDATE BANNER
    public function updatebanner(Request $request) {
        $request->validate([
            'bannerid'     => 'required',
            'banner_image' => 'nullable|image|mimes:png,jpg,webp,jpeg,gif|max:15360'
        ]);

        $bannerid = $request->bannerid;
        $postion  = $request->positionid;

        $updatebanner = BannerImage::find($bannerid);

        if (!$updatebanner) {
            return response()->json([
                'status'  => '404',
                'message' => 'Banner not found',
            ], 404);
        }

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');

            if (!$file->isValid()) {
                return response()->json([
                    'status'  => '422',
                    'message' => 'File upload failed: ' . $file->getErrorMessage(),
                ], 422);
            }

            // ── Dimension check ──────────────────────────────────────
            $dimError = $this->validateBannerDimensions($file);
            if ($dimError) {
                return response()->json([
                    'status'  => '422',
                    'message' => $dimError,
                ], 422);
            }
            // ─────────────────────────────────────────────────────────

            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/bannerimages'), $filename);
            $path = 'uploads/bannerimages/' . $filename;
            $updatebanner->banner_image = $path;
        }

        $updatebanner->banner_position = $postion;
        $updatebanner->save();

        return response()->json([
            'status'  => '200',
            'message' => 'Banner Updated Successfully',
        ]);
    }


    public function addsection(Request $request) {
        $request->validate([
            'section_image' => 'nullable|mimes:png,jpg,webp,jpeg,gif|max:15360'
        ]);

        if ($request->hasFile('section_image')) {
            $file     = $request->file('section_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/sectionimages'), $filename);
            $path = 'uploads/sectionimages/' . $filename;

            SectionBanner::create([
                'banner' => $path,
            ]);

            return response()->json([
                'status'  => '200',
                'message' => 'Section Image Added Successfully',
            ]);
        }

        return redirect('/banner/view')->with('error', 'No Image found');
    }

    // UPDATE SECTION
    public function updatesection(Request $request) {
        $request->validate([
            'sectionid'    => 'required',
            'section_image' => 'nullable|image|mimes:png,jpg,webp,jpeg,gif|max:15360'
        ]);

        $sectionid = $request->sectionid;
        $section   = SectionBanner::find($sectionid);

        if (!$section) {
            return response()->json([
                'status'  => '404',
                'message' => 'Section Banner not found',
            ], 404);
        }

        if ($request->hasFile('section_image')) {
            $file     = $request->file('section_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/sectionimages'), $filename);
            $path = 'uploads/sectionimages/' . $filename;
            $section->banner = $path;
            $section->save();
        }

        return response()->json([
            'status'  => '200',
            'message' => 'Section Banner Updated Successfully',
        ]);
    }

}