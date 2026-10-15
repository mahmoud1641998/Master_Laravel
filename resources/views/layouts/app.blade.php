<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'E-Commerce Management System')</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            min-height: 100vh;
        }

        .sidebar {
            min-height: calc(100vh - 56px);
        }

        .sidebar .nav-link {
            color: #495057;
            border-radius: 6px;
            padding: 10px 12px;
            margin-bottom: 5px;
        }

        .sidebar .nav-link:hover {
            background-color: #f1f3f5;
        }

        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: white;
        }

        main {
            min-width: 0;
        }
    </style>
</head>

<body class="bg-light">

    {{-- Top Navbar --}}
    <nav class="navbar navbar-dark bg-dark px-3 px-md-4">
        <a class="navbar-brand fw-semibold"
           href="{{ Route::has('orders.index') ? route('orders.index') : url('/') }}">
            E-Commerce System
        </a>

        <div class="ms-auto d-flex align-items-center gap-3">
            @auth
                <span class="text-white d-none d-sm-inline">
                    {{ auth()->user()->name }}
                </span>

                @if(Route::has('logout'))
                    <form action="{{ route('logout') }}"
                          method="POST"
                          class="m-0">
                        @csrf

                        <button type="submit"
                                class="btn btn-outline-light btn-sm">
                            Logout
                        </button>
                    </form>
                @endif
            @else
                @if(Route::has('login'))
                    <a href="{{ route('login') }}"
                       class="btn btn-outline-light btn-sm">
                        Login
                    </a>
                @endif
            @endauth
        </div>
    </nav>

    {{-- Main Layout --}}
    <div class="container-fluid">
        <div class="row">

            @auth
                {{-- Sidebar --}}
                <aside class="col-md-3 col-lg-2 bg-white border-end sidebar p-3">

                    <h6 class="text-secondary fw-bold mb-3">
                        MAIN MENU
                    </h6>

                    <nav class="nav flex-column">

                        <a href="{{ route('orders.index') }}"
                           class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}">
                            Orders
                        </a>

                        <a href="{{ route('customers.index') }}"
                           class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}">
                            Customers
                        </a>

                        <a href="{{ route('categories.index') }}"
                           class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                            Categories
                        </a>

                    </nav>
                </aside>
            @endauth

            {{-- Page Content --}}
            <main class="@auth col-md-9 col-lg-10 @else col-12 @endauth p-3 p-md-4">

                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show"
                         role="alert">
                        {{ session('success') }}

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                                aria-label="Close">
                        </button>
                    </div>
                @endif

                {{-- General Error Message --}}
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show"
                         role="alert">
                        {{ session('error') }}

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                                aria-label="Close">
                        </button>
                    </div>
                @endif

                {{-- Validation Errors --}}
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>Please correct the following errors:</strong>

                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')

            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
