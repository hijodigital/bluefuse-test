@extends('layouts.layout')

@section('content')
<div>
    <h1 class="mb-6">Enquiry from {{ $enquiry->name }}</h1>

    <div class="gap-4 grid md:grid-cols-2 w-full">
        <div>
            <div class="field-group">
                <label>Full name</label>
                <p>{{ $enquiry->name }}</p>
            </div>
            <div class="field-group">
                <label>Email address</label>
                <p><a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a></p>
            </div>
            <div class="field-group">
                <label>Phone number</label>
                <p>{{ $enquiry->phone ?? '—' }}</p>
            </div>
            <div class="field-group">
                <label>Service of interest</label>
                <p>{{ $enquiry->service }}</p>
            </div>
        </div>

        <div>
            <div class="field-group">
                <label>Date submitted</label>
                <p>{{ $enquiry->created_at->format('d M Y, H:i') }}</p>
            </div>
            <div class="field-group">
                <label>Current status</label>
                <p><span class="badge badge--{{ $enquiry->status }}">{{ $enquiry->status }}</span></p>
            </div>
            <div class="field-group">
                <label>Description</label>
                <p>{{ $enquiry->description }}</p>
            </div>
        </div>

    </div>

    <hr class="border-t border-gray-200 my-6" />

    <form method="POST" action="{{ route('admin.updateStatus', $enquiry) }}">
        @csrf
        <div class="form-group">
            <label for="status">Update status:</label>
            <div class="inline-flex gap-4">
                <select id="status" name="status">
                    @foreach (['new', 'reviewed', 'closed'] as $status)
                        <option value="{{ $status }}" {{ $enquiry->status === $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
                <button class="btn" type="submit">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection
