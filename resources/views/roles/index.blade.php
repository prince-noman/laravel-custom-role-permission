@extends('layouts.sidenav')


@section('content')


      <!-- Roles -->
<section id="roles">
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-2xl font-semibold">Roles</h2>
      <a href="{{ route('roles.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        + Create Role
      </a>
    </div>
  
    <!-- Role Listing Table -->
    <div class="bg-white p-6 rounded shadow">
      <h3 class="text-xl font-semibold mb-4">Role List</h3>
      <table class="min-w-full border">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-4 py-2 border">#</th>
            <th class="px-4 py-2 border">Role Name</th>
            <th class="px-4 py-2 border">Permissions</th>
            <th class="px-4 py-2 border">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
          <tr class="text-gray-700">
            <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
            <td class="px-4 py-2 border">{{ $role->name }}</td>
            <td class="px-4 py-2 border">
              <div class="flex flex-wrap gap-2">
                @foreach ($role->permissions as $permission)
                  <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">
                    {{ $permission->name }}
                  </span>
                @endforeach
              </div>
            </td>
            <td class="px-4 py-2 border space-x-2">
              <a href="{{ route('roles.edit', $role->id) }}" class="text-blue-500 hover:underline">Edit</a>
              
              <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this role?')" type="submit">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
  

@endsection