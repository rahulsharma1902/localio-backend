<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\ProCons;
use App\Models\Product;
use App\Models\ProductTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSettingsController extends Controller
{
    public function index()
    {
        return view('Admin.setting.dbrefresh.index');
    }

    public function refersh_database(Request $request)
    {
        $request->validate([
            'password' => 'required|min:3'
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $pass_check =   Hash::check($request->password, Auth::user()->password);
        if ($pass_check) {
            if (Product::count() == 0 && CategoryProduct::count() == 0 && ProductTranslation::count() == 0 && ProCons::count() == 0) {
                return redirect()->route('admin_dashboard')->with('error', 'No data available');
            }
            Product::truncate();
            CategoryProduct::truncate();
            ProductTranslation::truncate();
            ProCons::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            return redirect()->route('admin_dashboard')->with('success', 'Refresh the product table Successfully');
        } else {
            return redirect()->route('admin_dashboard')->with('error', 'Something Went Wrong !');
        }
    }
}
