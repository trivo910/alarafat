@extends('admin.layout', ['pageTitle' => 'Enquiries'])

@section('content')
    <section class="admin-panel">
        @if($enquiries->isEmpty())
            <p class="empty-state">No enquiries yet.</p>
        @else
            <div class="table-scroll">
                <table class="admin-table">
                    <thead><tr><th>Name</th><th>Contact</th><th>Type</th><th>Status</th><th>Received</th></tr></thead>
                    <tbody>
                        @foreach($enquiries as $enquiry)
                            <tr>
                                <td>{{ $enquiry->name ?: '—' }}</td>
                                <td>{{ $enquiry->email ?: $enquiry->phone ?: '—' }}</td>
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