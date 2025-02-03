<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .sidebar:hover ul li span {
            opacity: 1;
            visibility: visible;
        }

        .sidebar ul li svg {
            transition: transform 0.3s ease;
        }

        .sidebar ul li ul {
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease, opacity 0.5s ease;
        }

        .sidebar ul li:hover ul {
            opacity: 1;
            max-height: 500px;
        }

        .sidebar.collapsed {
            width: 60px;
        }

        .sidebar.collapsed ul li span,
        .sidebar.collapsed .sidebar-header {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <nav id="sidebar" class="sidebar bg-blue-600 text-white flex flex-col h-screen transition-all duration-300">
            <div class="p-4 text-center text-xl font-bold border-b border-indigo-500 sidebar-header">
                System Inventory
            </div>

            <ul class="flex-1 mt-4 overflow-y-auto">
                <li class="py-2 px-4 hover:bg-indigo-700 transition">
                    <a href="/super-user/dashboard" class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7A1 1 0 003 10h1v7a1 1 0 001 1h4a1 1 0 001-1v-4h2v4a1 1 0 001 1h4a1 1 0 001-1v-7h1a1 1 0 00.707-1.707l-7-7z" />
                        </svg>
                        <span>Home</span>
                    </a>
                </li>
                        <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-cyan-700 transition-all duration-300 transform hover:scale-105">
                            <button onclick="toggleSubmenu('submenu-inventaris')"
                                class="flex items-center space-x-2 w-full focus:outline-none group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10.586 3a2 2 0 011.414.586l2 2H20a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V7a2 2 0 012-2h4.586l2-2A2 2 0 0110.586 3zM10 5H4v12h16V7h-7.586l-2-2z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-white group-hover:text-white transition-colors duration-300">Barang Inventaris</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
        
                            <ul id="submenu-inventaris" class="ml-6 mt-2">
                                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                                    <a href="/super-user/daftar-barang" class="text-white hover:text-white">Daftar Barang</a>
                                </li>
                                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                                    <a href="/super-user/penerimaan-barang" class="text-white hover:text-white">Penerimaan Barang</a>
                                </li>
                            </ul>
                        </li>
        
        
                        <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-cyan-700 transition-all duration-300 transform hover:scale-105">
                            <button onclick="toggleSubmenu('submenu-peminjaman')"
                                class="flex items-center space-x-2 w-full focus:outline-none group">
                                <!-- Icon Kotak atau Barang -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M2.893 6.31a1 1 0 01.447-.894l7-4a1 1 0 01.92 0l7 4a1 1 0 01.447.894v7.38a1 1 0 01-.447.894l-7 4a1 1 0 01-.92 0l-7-4a1 1 0 01-.447-.894V6.31zm1.618-.447L10 3.118l5.49 2.745L10 8.608 4.51 5.863z" />
                                </svg>
                                <span class="text-white group-hover:text-white transition-colors duration-300">Peminjaman Barang</span>
                                <!-- Icon Panah -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
        
                            <ul id="submenu-peminjaman" class="ml-6 mt-2">
                                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                                    <a href="/super-user/peminjaman-barang" class="text-white hover:text-white">Daftar Peminjaman</a>
                                </li>
                                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                                    <a href="/super-user/pengembalian-barang" class="text-white hover:text-white">Pengembalian Barang</a>
                                </li>
                                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                                    <a href="/super-user/laporan-peminjaman" class="text-white hover:text-white">Barang Belum Kembali</a>
                                </li>
                            </ul>
                        </li>
        
        
                        <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-cyan-700 transition-all duration-300 transform hover:scale-105">
                            <button onclick="toggleSubmenu('submenu-laporan')"
                                class="flex items-center space-x-2 w-full focus:outline-none group">
                                <!-- Ikon Dokumen atau Laporan -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414a2 2 0 00-.586-1.414l-4-4A2 2 0 0010.586 2H6zm4 1.5L14.5 8H11a1 1 0 01-1-1V3.5zM6 11h8v2H6v-2zm0 4h5v2H6v-2z" />
                                </svg>
                                <span class="text-white group-hover:text-white transition-colors duration-300">Laporan</span>
                                <!-- Ikon Panah -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
        
                            <ul id="submenu-laporan" class="ml-6 mt-2">
                                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                                    <a href="/super-user/laporan-barang" class="text-white hover:text-white">Laporan Barang</a>
                                </li>
                                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                                    <a href="/super-user/laporan-peminjaman" class="text-white hover:text-white">Laporan Peminjaman</a>
                                </li>
                            </ul>
                        </li>
        
                        <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-cyan-700 transition-all duration-300 transform hover:scale-105">
                            <button onclick="toggleSubmenu('submenu-referensi')"
                                class="flex items-center space-x-2 w-full focus:outline-none group">
                                <!-- Ikon Buku atau Referensi -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H4zm12 14H4v-1h12v1zm0-3H4v-1h12v1zm0-3H4v-1h12v1z" />
                                </svg>
                                <span class="text-white group-hover:text-white transition-colors duration-300">Referensi</span>
                                <!-- Ikon Panah -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
        
                            <ul id="submenu-referensi" class="ml-6 mt-2">
                                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                                    <a href="/super-user/jenis-barang" class="text-white hover:text-white">Jenis Barang</a>
                                </li>
                                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                                    <a href="/super-user/daftar-pengguna" class="text-white hover:text-white">Daftar Pengguna</a>
                                </li>
                            </ul>
                        </li>
        
            </ul>
            
            <!-- Toggle Sidebar Button -->
            <button onclick="toggleSidebar()" class="p-2 bg-indigo-700 text-white w-full hover:bg-indigo-800 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </button>
        </nav>

        <div class="flex-1 flex flex-col h-screen overflow-auto">
            <header class="bg-white shadow p-4 flex items-center justify-end">
                <div class="flex items-center space-x-4">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-gray-500 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 0112 15a9 9 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </header>
            @yield('content')
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("collapsed");
        }
    </script>
</body>

</html>