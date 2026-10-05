@extends('admin.layout', ['pageTitle' => 'Packages'])

@push('head')
    @vite('resources/js/blog-editor.js')
@endpush

@section('content')
    <div class="page-actions"><a class="button-primary" href="#create-package">New package</a></div>

    <section class="admin-panel">
        @if($packages->isEmpty())
            <p class="empty-state">No packages yet. Add your first package below.</p>
        @else
            <div class="table-scroll">
                <table class="admin-table">
                    <thead><tr><th>Title</th><th>Category</th><th>Price</th><th>Status</th><th>Actions</th></tr></thead>
                    <tbody>
                        @foreach($packages as $package)
                            <tr>
                                <td>
                                    @if($package->status === 'published')
                                        <strong><a href="{{ url('/st-tour/' . $package->slug) }}">{{ $package->title }}</a></strong>
                                    @else
                                        <strong>{{ $package->title }}</strong>
                                    @endif
                                    <small class="subline">/st-tour/{{ $package->slug }}</small>
                                </td>
                                <td>{{ implode(', ', $package->categories ?: [$package->category]) }}</td>
                                <td>{{ $package->price !== null ? '₹' . number_format((float) $package->price, 2) : '—' }}</td>
                                <td><span class="status-pill {{ $package->status }}">{{ ucfirst($package->status) }}</span></td>
                                <td class="table-actions">
                                    <a href="{{ route('admin.packages.edit', $package) }}">Edit</a>
                                    <form method="POST" action="{{ route('admin.packages.destroy', $package) }}" onsubmit="return confirm('Delete this package?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button-link danger-link" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>

    <section class="admin-panel form-panel" id="create-package">
        <h2 class="panel-title">Add package</h2>
        @include('admin.packages._form', ['package' => null, 'formAction' => route('admin.packages.store')])
    </section>
@endsection