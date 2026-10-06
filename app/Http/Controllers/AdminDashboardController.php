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
        $typeFilter = request()->query('type');
        $enquiries = Enquiry::query()
            ->when(in_array($typeFilter, ['Booking', 'Contact'], true), fn ($query) => $query->where('type', $typeFilter))
            ->latest()
            ->get();

        return view('admin.enquiries.index', compact('enquiries', 'typeFilter'));
    }

    public function showEnquiry(Enquiry $enquiry)
    {
        return view('admin.enquiries.show', compact('enquiry'));
    }
}