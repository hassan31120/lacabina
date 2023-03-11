<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingsResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::find(1);
        if ($settings) {
            return response()->json([
                'success' => true,
                'settings' => new SettingsResource($settings)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'there is no settings'
            ], 404);
        }
    }

    public function update(Request $request)
    {
        $setting = Setting::find(1);
        $request->validate([
            'about'     => 'required',
            'about_en'  => 'required',
            'contact'   => 'required',
            'terms'     => 'required',
            'terms_en'  => 'required',
            'privacy'   => 'required',
            'privacy_en'    => 'required'
        ]);
        $data = $request->all();
        $setting->update($data);
        return response()->json([
            'success' => true,
            'message' => 'settings has been updated successfully'
        ], 200);
    }
}
