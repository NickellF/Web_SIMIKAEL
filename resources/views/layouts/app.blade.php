<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>SIMIKAEL - @yield('title', 'Sistem Informasi Praktik Kerja Lapangan')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        body {
            overscroll-behavior-x: none;
            max-width: 100%;
            overflow-x: hidden;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        @media (max-width: 640px) {
            a, button {
                min-height: 44px;
                min-width: 44px;
            }
        }
        
        /* Enhanced Navbar Styling */
        .navbar-gradient {
            background: linear-gradient(135deg, #1a202c, #2d3748);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .navbar-link {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .navbar-link:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #4299e1;
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .navbar-link:hover:before {
            transform: scaleX(1);
        }
        
        .navbar-link.active {
            color: #4299e1;
        }
        
        .user-dropdown {
            background: linear-gradient(to right, #2d3748, #1a202c);
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
    @yield('styles')
</head>
<body class="bg-gray-50 antialiased">
    @auth
    <!-- Navbar -->
    <nav class="navbar-gradient fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center">
                        <i class="fas fa-graduation-cap text-white text-2xl mr-3 transform transition-transform hover:scale-110"></i>
                        <span class="text-white text-xl font-bold tracking-wider hover:text-blue-300 transition-colors">SIMIKAEL</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden sm:block">
                    <div class="flex space-x-4">
                        @php $role = auth()->user()->role; @endphp
                        
                        @if($role == 'admin')
                            <a href="{{ route('admin.dashboard') }}" 
                               class="navbar-link text-white hover:text-blue-300 px-3 py-2 rounded-md {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="fas fa-home mr-2"></i>Dashboard
                            </a>
                            <a href="{{ route('admin.siswa.index') }}" 
                               class="navbar-link text-white hover:text-blue-300 px-3 py-2 rounded-md {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
                                <i class="fas fa-user-graduate mr-2"></i>Data Siswa
                            </a>
                            <a href="{{ route('admin.guru.index') }}" 
                               class="navbar-link text-white hover:text-blue-300 px-3 py-2 rounded-md {{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">
                                <i class="fas fa-chalkboard-teacher mr-2"></i>Data Guru
                            </a>
                            <a href="{{ route('admin.industri.index') }}" 
                               class="navbar-link text-white hover:text-blue-300 px-3 py-2 rounded-md {{ request()->routeIs('admin.industri.*') ? 'active' : '' }}">
                                <i class="fas fa-industry mr-2"></i>Data Industri
                            </a>
                            <a href="{{ route('admin.pengajuan.index') }}" 
                               class="navbar-link text-white hover:text-blue-300 px-3 py-2 rounded-md {{ request()->routeIs('admin.pengajuan.*') ? 'active' : '' }}">
                                <i class="fas fa-file-alt mr-2"></i>Pengajuan PKL
                            </a>
                        @elseif($role == 'guru')
                            <a href="{{ route('guru.dashboard') }}" 
                               class="navbar-link text-white hover:text-blue-300 px-3 py-2 rounded-md {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
                                <i class="fas fa-home mr-2"></i>Dashboard
                            </a>
                            <a href="{{ route('guru.pengajuan.index') }}" 
                               class="navbar-link text-white hover:text-blue-300 px-3 py-2 rounded-md {{ request()->routeIs('guru.pengajuan.*') ? 'active' : '' }}">
                                <i class="fas fa-file-alt mr-2"></i>Pengajuan PKL
                            </a>
                        @elseif($role == 'siswa')
                            <a href="{{ route('siswa.dashboard') }}" 
                               class="navbar-link text-white hover:text-blue-300 px-3 py-2 rounded-md {{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">
                                <i class="fas fa-home mr-2"></i>Dashboard
                            </a>
                            <a href="{{ route('siswa.pengajuan.index') }}" 
                               class="navbar-link text-white hover:text-blue-300 px-3 py-2 rounded-md {{ request()->routeIs('siswa.pengajuan.*') ? 'active' : '' }}">
                                <i class="fas fa-file-alt mr-2"></i>Pengajuan PKL
                            </a>
                            <a href="{{ route('siswa.status') }}" 
                               class="navbar-link text-white hover:text-blue-300 px-3 py-2 rounded-md {{ request()->routeIs('siswa.status') ? 'active' : '' }}">
                                <i class="fas fa-tasks mr-2"></i>Status PKL
                            </a>
                        @endif
                    </div>
                </div>

                <!-- User Menu -->
                <div class="flex items-center">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 text-white focus:outline-none hover:opacity-80 transition-opacity">
                            @if(auth()->user()->profile_picture)
                                <img src="{{ asset('storage/profile_pictures/' . auth()->user()->profile_picture) }}" 
                                     class="w-8 h-8 rounded-full border-2 border-white object-cover" 
                                     alt="Profile Picture">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->username) }}&background=0D8ABC&color=fff" 
                                     class="w-8 h-8 rounded-full border-2 border-white" 
                                     alt="Profile Picture">
                            @endif
                            <span class="hidden sm:block">{{ auth()->user()->username }}</span>
                            <i class="fas fa-chevron-down text-sm ml-1"></i>
                        </button>
                        
                        <div x-show="open" 
                        @click.away="open = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="user-dropdown absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1">
                       <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-sm text-white hover:bg-gray-700 transition-colors">
                           <i class="fas fa-user-edit mr-2"></i>Edit Profil
                       </a>
                       <form method="POST" action="{{ route('logout') }}">
                           @csrf
                           <button type="submit" class="w-full text-left px-4 py-2 text-sm text-white hover:bg-gray-700 transition-colors">
                               <i class="fas fa-sign-out-alt mr-2"></i>Logout
                           </button>
                       </form>
                   </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="sm:hidden">
                    <button type="button" class="mobile-menu-button text-white hover:text-blue-300 p-2 rounded-md focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile menu -->
            <div class="sm:hidden mobile-menu hidden">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    @if($role == 'admin')
                        <a href="{{ route('admin.dashboard') }}" 
                           class="text-white hover:text-blue-300 block px-3 py-2 rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-home mr-2"></i>Dashboard
                        </a>
                        <a href="{{ route('admin.siswa.index') }}" 
                           class="text-white hover:text-blue-300 block px-3 py-2 rounded-md {{ request()->routeIs('admin.siswa.*') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-user-graduate mr-2"></i>Data Siswa
                        </a>
                        <a href="{{ route('admin.guru.index') }}" 
                           class="text-white hover:text-blue-300 block px-3 py-2 rounded-md {{ request()->routeIs('admin.guru.*') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-chalkboard-teacher mr-2"></i>Data Guru
                        </a>
                        <a href="{{ route('admin.industri.index') }}" 
                           class="text-white hover:text-blue-300 block px-3 py-2 rounded-md {{ request()->routeIs('admin.industri.*') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-industry mr-2"></i>Data Industri
                        </a>
                        <a href="{{ route('admin.pengajuan.index') }}" 
                           class="text-white hover:text-blue-300 block px-3 py-2 rounded-md {{ request()->routeIs('admin.pengajuan.*') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-file-alt mr-2"></i>Pengajuan PKL
                        </a>
                    @elseif($role == 'guru')
                        <a href="{{ route('guru.dashboard') }}" 
                           class="text-white hover:text-blue-300 block px-3 py-2 rounded-md {{ request()->routeIs('guru.dashboard') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-home mr-2"></i>Dashboard
                        </a>
                        <a href="{{ route('guru.pengajuan.index') }}" 
                           class="text-white hover:text-blue-300 block px-3 py-2 rounded-md {{ request()->routeIs('guru.pengajuan.*') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-file-alt mr-2"></i>Pengajuan PKL
                        </a>
                    @elseif($role == 'siswa')
                        <a href="{{ route('siswa.dashboard') }}" 
                           class="text-white hover:text-blue-300 block px-3 py-2 rounded-md {{ request()->routeIs('siswa.dashboard') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-home mr-2"></i>Dashboard
                        </a>
                        <a href="{{ route('siswa.pengajuan.index') }}" 
                           class="text-white hover:text-blue-300 block px-3 py-2 rounded-md {{ request()->routeIs('siswa.pengajuan.*') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-file-alt mr-2"></i>Pengajuan PKL
                        </a>
                        <a href="{{ route('siswa.status') }}" 
                           class="text-white hover:text-blue-300 block px-3 py-2 rounded-md {{ request()->routeIs('siswa.status') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-tasks mr-2"></i>Status PKL
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    @endauth

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-h-screen w-full">
        <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-6 mt-16">
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg shadow-md" role="alert">
                    <p class="font-bold">Success</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg shadow-md" role="alert">
                    <p class="font-bold">Error</p>
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="bg-gradient-to-r from-gray-800 to-gray-900 py-6 mt-auto">
            <div class="container mx-auto text-center">
                <p class="text-sm text-gray-300">
                    © {{ date('Y') }} 
                    <span class="font-semibold text-blue-400">SIMIKAEL</span> 
                    - Sistem Informasi Praktik Kerja Lapangan
                </p>
                <div class="mt-2 space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fas fa-info-circle"></i> About
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fas fa-envelope"></i> Contact
                    </a>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', () => {
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');

            mobileMenuButton?.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', (event) => {
                const isClickInsideMobileMenu = mobileMenu.contains(event.target);
                const isClickOnMobileMenuButton = mobileMenuButton.contains(event.target);
                
                if (!isClickInsideMobileMenu && !isClickOnMobileMenuButton && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            });
        });
    </script>

    @yield('scripts')
    @stack('scripts')
</body>
</html>