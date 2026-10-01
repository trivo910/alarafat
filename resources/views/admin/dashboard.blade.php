@extends('admin.layout', ['pageTitle' => 'Dashboard'])

@section('content')
    <section class="stat-grid" aria-label="Site totals">
        <article class="stat-card"><span>Packages</span><strong>{{ $counts['packages'] }}</strong></article>
        <article class="stat-card"><span>Blog posts</span><strong>{{ $counts['blogs'] }}</strong></article>
        <article class="stat-card"><span>New enquiries</span><strong>{{ $counts['enquiries'] }}</strong></article>
    </section>

    <section class="admin-panel">
        <h2 class="panel-title">Recent enquiries</h2>
        @if($recentEnquiries->isEmpty())
            <p class="empty-state">No enquiries yet.</p>
        @else
            <div class="table-scroll">
                <table class="admin-table">
                    <thead><tr><th>Name</th><th>Type</th><th>Status</th><th>Received</th></tr></thead>
                    <tbody>
                        @foreach($recentEnquiries as $enquiry)
                            <tr>
                                <td>{{ $enquiry->name ?: '—' }}</td>
                                <td>{{ $enquiry->type ?: '—' }}</td>
                                <td>{{ ucfirst($enquiry->status) }}</td>
                                <td>{{ $enquiry->created_at->format('d M Y, H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection