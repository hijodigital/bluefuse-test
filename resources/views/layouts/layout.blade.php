<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiries</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="container mx-auto px-4 overflow-x-hidden">

<header class="border-b border-gray-300 mb-8 py-8" role="banner">
    <div class="flex justify-between">
        <a class="font-bold text-black" href="{{ route('enquiry.create') }}">Enquiries</a>
        <nav aria-label="Main navigation" class="flex gap-4">
            <a href="{{ route('enquiry.create') }}">New enquiry</a>
            <a href="{{ route('admin.index') }}">Admin</a>
        </nav>
    </div>
</header>

<main id="main-content">
    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</main>

</body>
</html>
