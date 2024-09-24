<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />


    <!-- Custom CSS -->
    <style>
        /* Sidebar styles */
        #sidebar {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #343a40;
            padding: 15px;
            transition: width 0.3s ease; /* Smooth transition */
            width: 250px; /* Default width */
        }

        /* Hide sidebar when class is added */
        #sidebar.hidden {
            width: 0;
            padding: 0;
            overflow: hidden;
        }

        /* Sidebar links */
        #sidebar ul li a {
            display: block;
            padding: 10px;
            color: white;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        /* Hover effect */
        #sidebar ul li a:hover {
            background-color: #6c757d;
        }

        /* Active menu item */
        #sidebar ul li a.active {
            background-color: #007bff;
            font-weight: bold;
        }

        /* Footer admin profile styling */
        .profile-dropdown {
            margin-top: auto; /* Pushes profile to the bottom */
        }
        .profile-dropdown a {
            color: white;
            text-decoration: none;
        }
        .profile-dropdown a:hover {
            color: #f8f9fa;
        }

        /* Page content when sidebar is hidden */
        .content-expanded {
            margin-left: 1rem;
        }
        .content{
            margin: 1rem;
        }
        
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="wrapper d-flex min-vh-100">
        <!-- Sidebar -->
        <nav id="sidebar" class="d-flex flex-column">
            <h2 class="text-white">PSA -  Dashboard</h2>
            <hr>
            <ul class="list-unstyled flex-grow-1">
                <li>
                    <a href="{{ route('home') }}" class="text-white navbar-brand {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="lni lni-dashboard"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users') }}" class="text-white navbar-brand {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                        <i class="lni lni-users"></i> Users
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.seller.request', ['id' => 1]) }}" class="text-white navbar-brand {{ request()->routeIs('admin.seller.request') ? 'active' : '' }}">
                        <i class="lni lni-files"></i> Seller Request
                    </a>
                </li>
            </ul>

            <!-- Admin Profile at the Footer -->
            <div class="dropdown profile-dropdown mt-auto">
                <a href="#" class="text-white d-flex align-items-center dropdown-toggle" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="lni lni-user"></i>
                    <span class="ms-2">
                        {{ Auth::user()->name }}
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="#">Profile Settings</a></li>
                    <li><a class="dropdown-item" href="#">Change Password</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="asid">
        <h1 id="toggleSidebar" class="btn mt-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
        </svg>
    </h1>
        </div>

        <!-- Page Content -->
        <div id="content" class="content w-100">
            <!-- Toggle Button -->
            @yield('content')
        </div>
    </div>

    <!-- Custom JS for toggling sidebar -->
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            sidebar.classList.toggle('hidden');
            content.classList.toggle('content-expanded');
        });
    </script>
</body>
</html>
