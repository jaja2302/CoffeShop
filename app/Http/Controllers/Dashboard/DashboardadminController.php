<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate;

#[\Illuminate\Routing\Middleware\SubstituteBindings]
#[\Illuminate\Auth\Middleware\Authenticate('admin')]
class DashboardadminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.index');
    }
}
