<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function general()
    {
        $settings = Setting::where('group', 'general')->pluck('value', 'key');

        return view('super-admin.settings.general', compact('settings'));
    }

    public function payment()
    {
        $settings = Setting::where('group', 'payment')->pluck('value', 'key');

        return view('super-admin.settings.payment', compact('settings'));
    }

    public function email()
    {
        $settings = Setting::where('group', 'email')->pluck('value', 'key');

        return view('super-admin.settings.email', compact('settings'));
    }

    // ঐচ্ছিক: প্রতিটা settings ফর্ম সাবমিট হলে এই একটা মেথড দিয়েই আপডেট করতে পারেন
    public function update(Request $request)
    {
        foreach ($request->except(['_token', '_method', 'group']) as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key, 'group' => $request->input('group')],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Settings updated successfully.');
    }
}