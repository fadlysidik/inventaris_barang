<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Inventory</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" sizes="180x180">
    <!-- Add Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Add Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Add Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
    /* Header sidebar default kecil */
.sidebar-header {
        white-space: nowrap; /* Hindari teks terpotong */
        overflow: hidden; /* Sembunyikan teks melebihi area */
        text-overflow: ellipsis; /* Tambahkan tiga titik jika teks terlalu panjang */
        opacity: 0; /* Sembunyikan teks saat sidebar tertutup */
        visibility: hidden; /* Buat teks tidak terlihat */
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    /* Header sidebar saat hover */
    .sidebar:hover .sidebar-header {
        opacity: 1; /* Tampilkan teks */
        visibility: visible; /* Buat teks terlihat */
    
    }

    /* Sidebar default kecil */
    .sidebar {
            width: 256px;
            transition: width 0.3s ease;
        }

        /* Sidebar Collapsed */
        .sidebar.collapsed {
            width: 64px;
        }

        /* Sidebar Header */
        .sidebar-header {
            position: relative;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            opacity: 1;
            visibility: visible;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        /* Teks Sidebar */
        .sidebar ul li span {
            opacity: 1;
            visibility: visible;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .sidebar.collapsed ul li span {
            opacity: 0;
            visibility: hidden;
        }
</style>

</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <nav class="sidebar bg-blue-800 text-white flex flex-col h-screen">

            <div class="p-4 text-center text-xl font-bold border-b border-gray-200 sidebar-header flex items-center justify-center space-x-2">
                <span>Inventaris</span>
            </div>


            <ul class="flex-1 mt-4 overflow-y-auto">
                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-black-700 hover:to-cyan-700 transition-all duration-300">
                    <a href="/super-user/dashboard" class="flex items-center space-x-2 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7A1 1 0 003 10h1v7a1 1 0 001 1h4a1 1 0 001-1v-4h2v4a1 1 0 001 1h4a1 1 0 001-1v-7h1a1 1 0 00.707-1.707l-7-7z" />
                        </svg>
                        <span class="group-hover:text-white transition-colors duration-300">Home</span>
                    </a>
                </li>
            
                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-black-700 hover:to-cyan-700 transition-all duration-300">
                    <button onclick="toggleSubmenu('submenu-inventaris')" class="flex items-center space-x-2 w-full focus:outline-none group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.586 3a2 2 0 011.414.586l2 2H20a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V7a2 2 0 012-2h4.586l2-2A2 2 0 0110.586 3zM10 5H4v12h16V7h-7.586l-2-2z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white">Barang Inventaris</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul id="submenu-inventaris" class="ml-6 mt-2 hidden">
                        <li class="py-2 px-4 hover:bg-black-700"><a href="/super-user/daftar-barang" class="text-white">Daftar Barang</a></li>
                        <li class="py-2 px-4 hover:bg-black-700"><a href="/super-user/penerimaan-barang" class="text-white">Penerimaan Barang</a></li>
                    </ul>
                </li>
                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-black-700 hover:to-cyan-700 transition-all duration-300">
                    <button onclick="toggleSubmenu('submenu-peminjaman')" class="flex items-center space-x-2 w-full focus:outline-none group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.586 3a2 2 0 011.414.586l2 2H20a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V7a2 2 0 012-2h4.586l2-2A2 2 0 0110.586 3zM10 5H4v12h16V7h-7.586l-2-2z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white">Peminjaman Barang</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul id="submenu-peminjaman" class="ml-6 mt-2 hidden">
                        <li class="py-2 px-4 hover:bg-black-700"><a href="/super-user/peminjaman-barang" class="text-white">Daftar Peminjaman</a></li>
                        <li class="py-2 px-4 hover:bg-black-700"><a href="/super-user/pengembalian-barang" class="text-white">Pengembalian Barang</a></li>
                        <li class="py-2 px-4 hover:bg-black-700"><a href="/super-user/laporan-peminjaman" class="text-white">Barang Belum Kembali</a></li>
                    </ul>
                </li>
                
                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-black-700 hover:to-cyan-700 transition-all duration-300">
                    <button onclick="toggleSubmenu('submenu-laporan')" class="flex items-center space-x-2 w-full focus:outline-none group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.586 3a2 2 0 011.414.586l2 2H20a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V7a2 2 0 012-2h4.586l2-2A2 2 0 0110.586 3zM10 5H4v12h16V7h-7.586l-2-2z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white">Laporan</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul id="submenu-laporan" class="ml-6 mt-2 hidden">
                        <li class="py-2 px-4 hover:bg-black-700"><a href="/super-user/laporan-barang" class="text-white">Laporan Barang</a></li>
                        <li class="py-2 px-4 hover:bg-black-700"><a href="/super-user/laporan-peminjaman" class="text-white">Laporan Peminjaman</a></li>
                    </ul>
                </li>
                
                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-black-700 hover:to-cyan-700 transition-all duration-300">
                    <button onclick="toggleSubmenu('submenu-referensi')" class="flex items-center space-x-2 w-full focus:outline-none group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.586 3a2 2 0 011.414.586l2 2H20a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V7a2 2 0 012-2h4.586l2-2A2 2 0 0110.586 3zM10 5H4v12h16V7h-7.586l-2-2z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-white">Referensi</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul id="submenu-referensi" class="ml-6 mt-2 hidden">
                        <li class="py-2 px-4 hover:bg-black-700"><a href="{{ route('superuser.jenisBarang.index') }}" class="text-white">Jenis Barang</a></li>
                        <li class="py-2 px-4 hover:bg-black-700"><a href="{{ route('superuser.daftarPengguna.index') }}" class="text-white">Daftar Pengguna</a></li>
                    </ul>
                </li>
                
            </ul>
            
            <script>
                function toggleSubmenu(id) {
                    var submenu = document.getElementById(id);
                    if (submenu.classList.contains('hidden')) {
                        submenu.classList.remove('hidden');
                    } else {
                        submenu.classList.add('hidden');
                    }
                }
            </script>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col h-screen overflow-auto">
            <header class="bg-blue-800 shadow p-4 flex items-center justify-end">
                <div class="flex items-center space-x-4">
                    <form method="GET" action="{{ route('logout') }}" class="inline-block">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-red-500 to-red-700 text-white font-bold rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6-4v8" />
                            </svg>
                            Logout
                        </button>
                    </form>

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 rounded-full border-2 border-gray-300 shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
            </header>
            @yield('content')
        </div>



    </div>

    <!-- Add Custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function toggleSubmenu(submenuId) {
            const allSubmenus = document.querySelectorAll("ul[id^='submenu']");

            // Tutup semua submenu lainnya
            allSubmenus.forEach((submenu) => {
                if (submenu.id !== submenuId) {
                    submenu.classList.remove('open');
                }
            });

            // Toggle submenu yang sesuai tombolnya
            const submenu = document.getElementById(submenuId);
            submenu.classList.toggle('open');
        }

        function toggleSubmenu(id) {
        var submenu = document.getElementById(id);
        if (submenu.classList.contains('hidden')) {
            submenu.classList.remove('hidden');
        } else {
            submenu.classList.add('hidden');
        }
    }
    </script>


    @stack('scripts')

</body>

</html>
