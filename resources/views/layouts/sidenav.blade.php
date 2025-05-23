<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery (Required for Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById("sidebar");
      sidebar.classList.toggle("-translate-x-full");
    }
  </script>
  <script>
  $(document).ready(function() {
    $('#permissions').select2({
      placeholder: "Select permissions",
      allowClear: true
    });
  });
</script>

</head>

<body class="flex min-h-screen bg-gray-100">
  <!-- Sidebar -->
  <div id="sidebar" class="w-64 bg-gray-900 text-white p-5 space-y-4 transform transition-transform duration-300 md:translate-x-0 -translate-x-full fixed md:relative z-50 h-screen">
    <!-- Close button for mobile -->
    <button class="md:hidden text-white absolute top-4 right-4" onclick="toggleSidebar()">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
    
    <h2 class="text-2xl font-bold mb-6"><a href="{{ route('dashboard') }}">Dashboard</a></h2>
    <nav class="space-y-2">
      {{-- @admin --}}
      {{-- @if(Auth::user()->hasRole('admin')) --}}
      @role('admin', 'manager')
      <a href="{{ route('users.index') }}"
         class="block p-2 rounded hover:bg-gray-700 {{ request()->routeIs('users.*') ? 'bg-gray-800 text-white' : '' }}">
          Users
      </a>
  
      <a href="{{ route('roles.index') }}"
         class="block p-2 rounded hover:bg-gray-700 {{ request()->routeIs('roles.*') ? 'bg-gray-800 text-white' : '' }}">
          Roles
      </a>
  
      <a href="{{ route('permissions.index') }}"
         class="block p-2 rounded hover:bg-gray-700 {{ request()->routeIs('permissions.*') ? 'bg-gray-800 text-white' : '' }}">
          Permissions
      </a>
      {{-- @endadmin --}}
      {{-- @endif --}}
      @endrole
  
      
      <a href="{{ route('posts.index') }}"
         class="block p-2 rounded hover:bg-gray-700 {{ request()->routeIs('posts.*') ? 'bg-gray-800 text-white' : '' }}">
          Posts
      </a>
      
  </nav>
  </div>

  <!-- Main Content -->
    <div class="flex-1 md-64"> 
    <!-- Header -->
    <header class="bg-white shadow p-4 flex items-center justify-between">
      <button class="md:hidden text-gray-500" onclick="toggleSidebar()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
      <div class="flex items-center justify-between w-full">
        <h1 class="text-xl font-bold">Admin Dashboard - {{ Auth::user()->name }}</h1>
      
        <form action="{{ route('logout') }}" method="post" class="p-3 inline">
            @csrf
            <button class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded shadow" type="submit">Logout</button>
        </form>
    
      </div>
    </header>

    <!-- Pages -->
    <main class="p-6 space-y-12">
      @yield('content')
    </main>
  </div>
</body>

</html>