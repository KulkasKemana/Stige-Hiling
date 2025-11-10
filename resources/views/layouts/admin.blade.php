<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
        .sidebar-link {
            transition: all 0.2s ease;
        }
        .sidebar-link:hover {
            background: linear-gradient(90deg, rgba(255, 145, 77, 0.1) 0%, transparent 100%);
            border-left: 3px solid #ff914d;
            padding-left: 1.25rem;
        }
        .sidebar-link.active {
            background: linear-gradient(90deg, rgba(255, 145, 77, 0.15) 0%, transparent 100%);
            border-left: 3px solid #ff914d;
            color: #ff914d;
            font-weight: 600;
        }
        .stat-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }
        .dropdown-menu {
            display: none;
        }
        .dropdown-menu.show {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-gray-900 to-gray-800 text-white fixed h-full z-30 shadow-2xl">
            <!-- Logo -->
            <div class="flex items-center justify-center h-20 bg-black/20 border-b border-gray-700">
                <img src="{{ asset('assets/Logo_Healing_no_bg.png') }}" class="h-10 mr-2" alt="Logo">
                <span class="font-bold text-lg">Admin Panel</span>
            </div>
            
            <!-- Navigation -->
            <nav class="mt-6 px-3">
                <div class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home w-6"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                    
                    <a href="{{ route('admin.destinations.index') }}" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.destinations.*') ? 'active' : '' }}">
                        <i class="fas fa-map-marked-alt w-6"></i>
                        <span class="ml-3">Destinations</span>
                    </a>
                    
                    <a href="{{ route('admin.bookings.index') }}" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                        <i class="fas fa-ticket-alt w-6"></i>
                        <span class="ml-3">Bookings</span>
                    </a>
                    
                    <a href="{{ route('admin.users.index') }}" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="fas fa-users w-6"></i>
                        <span class="ml-3">Users</span>
                    </a>
                    
                    <a href="{{ route('admin.reports') }}" 
                       class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                        <i class="fas fa-chart-bar w-6"></i>
                        <span class="ml-3">Reports</span>
                    </a>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-700 my-6"></div>

                <!-- Back to Website -->
                <a href="{{ route('home') }}" 
                   class="sidebar-link flex items-center px-4 py-3 text-gray-300 rounded-lg">
                    <i class="fas fa-globe w-6"></i>
                    <span class="ml-3">Back to Website</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Top Navigation Bar -->
            <header class="bg-white h-20 flex items-center justify-between px-8 shadow-sm sticky top-0 z-20">
                <div class="flex items-center space-x-4">
                    <h2 class="text-2xl font-bold text-gray-800">@yield('title', 'Dashboard')</h2>
                </div>
                
                <div class="flex items-center space-x-6">
                    <!-- Notifications -->
                    <button class="relative text-gray-600 hover:text-orange-500 transition">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">3</span>
                    </button>

                    <!-- User Dropdown -->
                    <div class="relative">
                        <button onclick="toggleDropdown()" class="flex items-center space-x-3 text-gray-700 hover:text-orange-500 transition">
                            <img src="{{ asset('assets/Profile-Icon.png') }}" class="h-10 w-10 rounded-full border-2 border-orange-500">
                            <div class="text-left hidden md:block">
                                <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div>
                            <i class="fas fa-chevron-down text-sm"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div id="userDropdown" class="dropdown-menu absolute right-0 mt-3 w-48 bg-white rounded-lg shadow-xl py-2 border border-gray-100">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition">
                                <i class="fas fa-user mr-2"></i> My Profile
                            </a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-8">
                @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-3"></i>
                        <p class="text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
                @endif

                @if(session('error'))
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                        <p class="text-red-700">{{ session('error') }}</p>
                    </div>
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        window.addEventListener('click', function(e) {
            if (!e.target.matches('.fa-chevron-down') && !e.target.closest('button')) {
                const dropdown = document.getElementById('userDropdown');
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                }
            }
        });
    </script>

    @stack('scripts')
</body>
</html>