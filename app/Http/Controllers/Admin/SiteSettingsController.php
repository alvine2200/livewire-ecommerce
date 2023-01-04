<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SiteFormRequest;
use App\Models\Setting;
use Sabberworm\CSS\Settings;

class SiteSettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('admin.site_settings.index', compact('settings'));
    }

    public function store(SiteFormRequest $request)
    {
        $valid = $request->validated();
        $settings = Setting::first();
        if ($settings) {
            //update data
            $settings->update($valid);
            return redirect('/admin/setting')->with('status', 'Site Details Updated Successfully');
        } else {
            //create setting
            Setting::create($valid);
            return redirect('/admin/setting')->with('status', 'Site Details Created Successfully');
        }
    }
}
