@extends('layouts.sidenav')


@section('content')

<section id="users">
    <h2 class="text-2xl font-semibold mb-4">Users</h2>

    <!-- User Listing Table -->
    <div class="bg-white p-6 rounded shadow">
      <h3 class="text-xl font-semibold mb-4">User List</h3>
      <table class="min-w-full border">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-4 py-2 border">#</th>
            <th class="px-4 py-2 border">Name</th>
            <th class="px-4 py-2 border">Email</th>
            <th class="px-4 py-2 border">Role</th>
            <th class="px-4 py-2 border">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="text-gray-700">
                <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                <td class="px-4 py-2 border">{{ $user->name }}</td>
                <td class="px-4 py-2 border">{{ $user->email }}</td>
                <td class="px-4 py-2 border">{{ $user->role->name ?? '' }}</td>
                <td class="px-4 py-2 border space-x-2">
                  <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:underline">Edit</a>
                  
                  <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          
          
        </tbody>
      </table>
    </div>
  </section>


@endsection