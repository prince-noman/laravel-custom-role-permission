@extends('layouts.sidenav')


@section('content')
      <!-- Permissions -->
      <section id="permissionsS">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-semibold">Permissions</h2>
            <a href="{{ route('permissions.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
              + Create Permission
            </a>
          </div>
      
        <!-- Permission Listing Table -->
        <div class="bg-white p-6 rounded shadow">
          <h3 class="text-xl font-semibold mb-4">Permission List</h3>
          <table class="min-w-full border">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2 border">#</th>
                <th class="px-4 py-2 border">Permission Name</th>
                <th class="px-4 py-2 border">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($permissions as $permission)
              <tr class="text-gray-700">
                <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                <td class="px-4 py-2 border">{{ $permission->name }}</td>
                <td class="px-4 py-2 border space-x-2">
                  <a href="{{ route('permissions.edit', $permission->id) }}" class="text-blue-500 hover:underline">Edit</a>
                  <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this permission?')" type="submit">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
      </section>
      
@endsection