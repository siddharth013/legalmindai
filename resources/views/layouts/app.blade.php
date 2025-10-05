<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - LegalMindAI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-dark text-light">
    

    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">LegalMindAI</a>
        </div>
    </nav>

    <main class="py-5">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="bg-black text-center text-light py-3">
        &copy; 2025 LegalMindAI - All rights reserved
    </footer>
@yield('scripts')

</body>
</html>
