@extends('layouts.sidenav')


@section('content')


      <!-- Roles -->
      <section id="roles">
        <h2 class="text-2xl font-semibold mb-4">Roles</h2>
      
        <!-- Role Form -->
        <div class="bg-white p-6 rounded shadow mb-6">
          <h3 class="text-xl font-semibold mb-4">Edit Role</h3>
          <form action="{{ route('roles.update', $role->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
              <label class="block text-gray-700">Role Name</label>
              <input name="name" value="{{ $role->name }}" type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="Role Name">
            </div>
            <div>
              <label class="block text-gray-700">Assign Permissions</label>
              <select name="permissions[]" id="permissions" multiple class="w-full p-2 border border-gray-300 rounded">

                @foreach ($permissions as $permission)
                  <option value="{{ $permission->id }}" 
                    @selected($role->hasPermission($permission->name))
                    >
                    {{ $permission->name }}
                  </option>
                @endforeach
              </select>
              
            </div>
            <div>
              <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Role</button>
            </div>
          </form>
        </div>
      
     
    </section>

@endsection