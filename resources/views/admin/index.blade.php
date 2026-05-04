@extends('layouts.layout')

@section('content')
<h1>Admin</h1>

@if ($enquiries->isEmpty())
    <p>No enquiries found.</p>
@else
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enquiries as $enquiry)
                    <tr>
                        <td>{{ $enquiry->name }}</td>
                        <td>{{ $enquiry->email }}</td>
                        <td>{{ $enquiry->service }}</td>
                        <td><span class="badge badge--{{ $enquiry->status }}">{{ $enquiry->status }}</span></td>
                        <td>{{ $enquiry->created_at->format('d M Y, H:i') }}</td>
                        <td>
                            <a class="btn" href="{{ route('admin.show', $enquiry) }}">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
