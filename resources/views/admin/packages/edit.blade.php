@extends('admin.layout', ['pageTitle' => 'Edit package'])

@push('head')
    @vite('resources/js/blog-editor.js')
@endpush

@section('content')
    <section class="admin-panel form-panel package-form-panel">
        <h2 class="panel-title">Edit package</h2>
        @include('admin.packages._form', ['package' => $package, 'formAction' => route('admin.packages.update', $package)])
    </section>
@endsection