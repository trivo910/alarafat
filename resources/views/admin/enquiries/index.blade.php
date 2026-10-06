@extends('admin.layout', ['pageTitle' => 'Enquiries'])

@section('content')
    <nav class="enquiry-filters" aria-label="Filter enquiries">
        <a class="{{ ! in_array($typeFilter, ['Booking', 'Contact'], true) ? 'active' : '' }}" href="{{ route('admin.enquiries') }}">All</a>
        <a class="{{ $typeFilter === 'Booking' ? 'active' : '' }}" href="{{ route('admin.enquiries', ['type' => 'Booking']) }}">Booking</a>
        <a class="{{ $typeFilter === 'Contact' ? 'active' : '' }}" href="{{ route('admin.enquiries', ['type' => 'Contact']) }}">Contact</a>
    </nav>
    <section class="admin-panel">
        @if($enquiries->isEmpty())
            <p class="empty-state">No enquiries yet.</p>
        @else
            <div class="table-scroll">
                <table class="admin-table">
                    <thead><tr><th>Name</th><th>Contact</th><th>Type</th><th>Package</th><th>Status</th><th>Received</th><th>Actions</th></tr></thead>
                    <tbody>
                        @foreach($enquiries as $enquiry)
                            <tr>
                                <td>{{ $enquiry->name ?: '—' }}</td>
                                <td>{{ $enquiry->email ?: '—' }}<span class="subline">{{ $enquiry->phone ?: '—' }}</span></td>
                                <td>{{ $enquiry->type ?: '—' }}</td>
                                <td>{{ $enquiry->package_name ?: '—' }}</td>
                                <td>{{ ucfirst($enquiry->status) }}</td>
                                <td>{{ $enquiry->created_at->format('d M Y, H:i') }}</td>
                                <td><a href="{{ route('admin.enquiries.show', $enquiry) }}">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection