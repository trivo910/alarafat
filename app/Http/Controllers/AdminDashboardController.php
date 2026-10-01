<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Enquiry;
use App\Models\Package;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'packages' => Package::count(),
            'blogs' => Blog::count(),
            'enquiries' => Enquiry::count(),
        ];
        $recentEnquiries = Enquiry::latest()->limit(5)->get();

        return view('admin.dashboard', compact('counts', 'recentEnquiries'));
    }

    public function enquiries()
    {
        $enquiries = Enquiry::latest()->get();

        return view('admin.enquiries.index', compact('enquiries'));
    }
}