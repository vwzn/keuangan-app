<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>KEUANGAN App</title>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<style>
    .hidden{
        display: none;
    }
</style>
<body class="font-serif">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-gray-800 text-white w-1/4 p-4">
            <ul class="space-y-4">
                <li>
                    <a href="{{ route('siswas.index') }}" class="btn btn-primary glass block w-full">Siswa</a>
                </li>
                <li>
                    <a href="{{ route('uangs.index') }}" class="btn btn-primary glass block w-full text-center">Uang</a>
                </li>
            </ul>
        </div>
        <!-- Content -->
        <div id="content" class="bg-gray-100 w-3/4 p-4 overflow-y-auto h-screen">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
    
    <!-- Toggle Sidebar Buttons -->
    <button id="toggleSidebarOpen" onclick="toggleSidebar(true)" class="fixed left-0 top-1/2 transform -translate-y-1/2 px-4 py-2 bg-gray-800 text-white rounded-l-full focus:outline-none">Open Sidebar</button>
    <button id="toggleSidebarClose" onclick="toggleSidebar(false)" class="fixed left-0 top-1/2 transform -translate-y-1/2 px-4 py-2 bg-gray-800 text-white rounded-r-full focus:outline-none hidden">Close Sidebar</button>
    

    <script>
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const toggleSidebarOpen = document.getElementById('toggleSidebarOpen');
        const toggleSidebarClose = document.getElementById('toggleSidebarClose');
    
        // Function to toggle sidebar
        function toggleSidebar(open) {
            if (open) {
                sidebar.classList.remove('hidden');
                content.classList.remove('w-full');
                content.classList.add('w-3/4');
                toggleSidebarOpen.classList.add('hidden');
                toggleSidebarClose.classList.remove('hidden');
            } else {
                sidebar.classList.add('hidden');
                content.classList.remove('w-3/4');
                content.classList.add('w-full');
                toggleSidebarOpen.classList.remove('hidden');
                toggleSidebarClose.classList.add('hidden');
            }
        }
    </script>
    

</body>

</html>
