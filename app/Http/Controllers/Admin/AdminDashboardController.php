<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $this->setPageTitle('Dashboard', '');
        return view('cms.admin.dashboard');
    }
}
