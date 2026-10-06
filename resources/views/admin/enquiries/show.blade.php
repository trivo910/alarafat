@extends('admin.layout', ['pageTitle' => 'Enquiry details'])

@section('content')
    <p class="enquiry-back"><a href="{{ route('admin.enquiries') }}">← Back to enquiries</a></p>
    <section class="admin-panel enquiry-detail">
        <dl>
            <div><dt>Name</dt><dd>{{ $enquiry->name ?: '—' }}</dd></div>
            <div class="enquiry-detail-columns">
                <div><dt>Email</dt><dd>{{ $enquiry->email ?: '—' }}</dd></div>
                <div><dt>Phone</dt><dd>{{ $enquiry->phone ?: '—' }}</dd></div>
            </div>
            <div><dt>Type</dt><dd>{{ $enquiry->type ?: '—' }}</dd></div>
            <div><dt>Package</dt><dd>{{ $enquiry->package_name ?: '—' }}</dd></div>
            <div><dt>Message</dt><dd class="enquiry-message">{{ $enquiry->message ?: '—' }}</dd></div>
            <div><dt>Status</dt><dd>{{ ucfirst($enquiry->status) }}</dd></div>
            <div><dt>Received</dt><dd>{{ $enquiry->created_at->format('d M Y, H:i') }}</dd></div>
        </dl>
    </section>
@endsection
