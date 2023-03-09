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

    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);
        $request->validate([
            'about'     => 'required',
            'contact'   => 'required',
            'terms'     => 'required',
            'privacy'   => 'required'
        ]);

        $data = $request->all();

        $setting->update($data);
        return redirect()->back()->with('success', 'تم تعديل الإعدادات بنجاح');
    }
}
