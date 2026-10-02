<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\View\View;

class PackageController extends Controller
{
    public function hajj(): View
    {
        return $this->listing('hajj', 'Hajj');
    }

    public function umrah(): View
    {
        return $this->listing('umrah', 'Umrah');
    }

    public function ramzan(): View
    {
        return $this->listing('ramzan', 'Ramzan');
    }

    public function ziyarat(): View
    {
        return $this->listing('ziyarat', 'Ziyarat');
    }

    public function show(string $slug): View
    {
        $package = Package::query()
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $activePage = match ($package->category) {
            'Hajj' => 'hajj',
            'Ramzan' => 'ramzan',
            'Ziyarat' => 'ziyarat',
                default => 'umrah',
            };
            $categoryUrl = match ($package->category) {
                'Hajj' => '/hajj',
                'Ramzan' => '/ramzan-umrah-package-from-mumbai',
                'Ziyarat' => '/ziyarat',
                default => '/umrah-package-from-mumbai',
        };

        $relatedPackages = Package::query()
            ->where('status', 'published')
            ->whereKeyNot($package->id)
            ->latest()
            ->take(4)
            ->get();

        return view('packages.show', compact('package', 'activePage', 'categoryUrl', 'relatedPackages'));
    }

    private function listing(string $view, string $category): View
    {
        $packages = Package::query()
            ->where('status', 'published')
            ->where('category', $category)
            ->latest()
            ->get();

        return view($view, compact('packages'));
    }
}