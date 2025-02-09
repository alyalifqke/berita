<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first(); // Ambil pengaturan pertama
        return view('admin.settings.index', compact('setting'));
    }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'site_name' => 'required|string|max:255',
    //         'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'phone' => 'nullable|string|max:20',
    //         'address' => 'nullable|string|max:255',
    //         'footer_info' => 'nullable|string',
    //         'modal_active' => 'boolean',
    //         'modal_content' => 'nullable|string',
    //         'ad_image_1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'ad_image_2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $setting = Setting::firstOrCreate([]);

    //     if ($request->hasFile('logo')) {
    //         if ($setting->logo) {
    //         Storage::delete('public/' . $setting->logo);
    //         }
    //         $setting->logo = $request->file('logo')->store('logos', 'public');
    //     }

    //     // Hapus iklan 1 lama jika ada & upload baru
    //     if ($request->hasFile('ad_image_1')) {
    //         if ($setting->ad_image_1) {
    //             Storage::delete('public/' . $setting->ad_image_1);
    //         }
    //         $setting->ad_image_1 = $request->file('ad_image_1')->store('ads', 'public');
    //     }

    //     // Hapus iklan 2 lama jika ada & upload baru
    //     if ($request->hasFile('ad_image_2')) {
    //         if ($setting->ad_image_2) {
    //             Storage::delete('public/' . $setting->ad_image_2);
    //         }
    //         $setting->ad_image_2 = $request->file('ad_image_2')->store('ads', 'public');
    //     }

    //     // Simpan data lainnya
    //     $setting->site_name = $request->site_name;
    //     $setting->phone = $request->phone;
    //     $setting->address = $request->address;
    //     $setting->footer_info = $request->footer_info;
    //     $setting->modal_active = $request->modal_active;
    //     $setting->modal_content = $request->modal_content;
    //     $setting->save();

    //     return back()->with('success', 'Pengaturan berhasil diperbarui!');
    
    // }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'ad_image_1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'ad_image_2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'footer_info' => 'nullable|string',
            'modal_active' => 'boolean',
            'modal_content' => 'nullable|string',
        ]);

        $setting = Setting::firstOrCreate([]);

// Hapus logo lama jika ada & upload logo baru
if ($request->hasFile('logo')) {
    if ($setting->logo && file_exists(public_path('storage/' . $setting->logo))) {
        unlink(public_path('storage/' . $setting->logo));
    }
    $setting->logo = $request->file('logo')->store('logos', 'public');
}
    // if ($request->hasFile('logo')) {
    //     $logoPath = $request->file('logo')->store('logos', 'public');
    //     $setting->logo = $logoPath;
    // }

// Hapus iklan 1 lama jika ada & upload baru
if ($request->hasFile('ad_image_1')) {
    if ($setting->ad_image_1 && file_exists(public_path('storage/' . $setting->ad_image_1))) {
        unlink(public_path('storage/' . $setting->ad_image_1));
    }
    $setting->ad_image_1 = $request->file('ad_image_1')->store('ads', 'public');
}

// Hapus iklan 2 lama jika ada & upload baru
if ($request->hasFile('ad_image_2')) {
    if ($setting->ad_image_2 && file_exists(public_path('storage/' . $setting->ad_image_2))) {
        unlink(public_path('storage/' . $setting->ad_image_2));
    }
    $setting->ad_image_2 = $request->file('ad_image_2')->store('ads', 'public');
}
        // Simpan data lainnya
        $setting->site_name = $request->site_name;
        $setting->phone = $request->phone;
        $setting->address = $request->address;
        $setting->ads = $request->ads;
        $setting->footer_info = $request->footer_info;
        $setting->modal_active = $request->modal_active;
        $setting->modal_content = $request->modal_content;
        // dd($setting);
        $setting->save();
        Alert::success('Berhasil!', 'Kategori berhasil ditambahkan.');
        return back();
    }

    // public function deleteImage(Request $request, $type)
    // {
    //     $setting = Setting::first();

    //     if (!$setting) {
    //         return back()->with('error', 'Pengaturan tidak ditemukan.');
    //     }

    //     if ($type === 'logo' && $setting->logo) {
    //         Storage::delete('public/' . $setting->logo);
    //         $setting->logo = null;
    //     } elseif ($type === 'ad_image_1' && $setting->ad_image_1) {
    //         Storage::delete('public/' . $setting->ad_image_1);
    //         $setting->ad_image_1 = null;
    //     } elseif ($type === 'ad_image_2' && $setting->ad_image_2) {
    //         Storage::delete('public/' . $setting->ad_image_2);
    //         $setting->ad_image_2 = null;
    //     } else {
    //         return back()->with('error', 'Gambar tidak ditemukan.');
    //     }

    //     $setting->save();

    //     return back()->with('success', ucfirst($type) . ' berhasil dihapus.');
    // }
}
