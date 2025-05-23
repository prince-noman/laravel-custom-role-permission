@extends('layouts.sidenav')


@section('content')

<section id="users">
    <h2 class="text-2xl font-semibold mb-4">Users</h2>

    <!-- User Form -->
    <div class="bg-white p-6 rounded shadow mb-6">
      <h3 class="text-xl font-semibold mb-4"> Edit User</h3>
      <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
        @method('PUT')
        @csrf
        <div>
          <label class="block text-gray-700">Name</label>
          <input name="name" value="{{ $user->name }}" type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="Full Name">
        </div>
        <div>
          <label class="block text-gray-700">Email</label>
          <input name="email" value="{{ $user->email }}" type="email" class="w-full p-2 border border-gray-300 rounded" placeholder="Email Address">
        </div>
        <div>
          <label class="block text-gray-700">Role</label>
          <select name="role_id" class="w-full p-2 border border-gray-300 rounded">
            @foreach ($roles as $role)
                  <option value="{{ $role->id }}" 
                    @selected($user->hasRole($role->name))
                    >
                    {{ $role->name }}
                  </option>
                @endforeach
          </select>
        </div>
        
        <div>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save User</button>
        </div>
      </form>
    </div>

  </section>


@endsection