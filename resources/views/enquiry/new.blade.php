@extends('layouts.layout')

@section('content')
<div class="max-w-xl">
    <h1>New enquiry</h1>

    <form method="POST" action="{{ route('enquiry.store') }}" novalidate>
        @csrf

        <div class="form-group">
            <label for="name">Full name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone number <span>(optional)</span></label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">
            @error('phone')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="service">Service of interest</label>
            <select id="service" name="service">
                <option value="" disabled {{ old('service') ? '' : 'selected' }}>Select a service…</option>
                @foreach ($services as $service)
                    <option value="{{ $service }}" {{ old('service') === $service ? 'selected' : '' }}>
                        {{ $service }}
                    </option>
                @endforeach
            </select>
            @error('service')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Brief description of your enquiry</label>
            <textarea id="description" name="description" rows="5">{{ old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button class="btn" type="submit">Submit</button>
    </form>
</div>
@endsection
