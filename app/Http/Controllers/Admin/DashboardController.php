<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\App\Events\LastLogin;
use App\Repositories\Admin\AdminRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $adminRepo;

    public function __construct(AdminRepositoryInterface $adminRepo)
    {
        $this->adminRepo = $adminRepo;
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.dashboard.index');
    }
}
