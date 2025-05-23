@extends('layouts.sidenav')


@section('content')
      <!-- Permissions -->
      <section id="permissionsS">
        <h2 class="text-2xl font-semibold mb-4">Permissions</h2>
      
          <!-- Permission Form -->
  <div class="bg-white p-6 rounded shadow mb-6">
    <h3 class="text-xl font-semibold mb-4">Create / Edit Permission</h3>
    <form class="space-y-4" action="{{ route('permissions.store') }}" method="POST">
      @csrf
      <div>
        <label class="block text-gray-700">Permission Name</label>
        <input name="name" type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="Permission Name">
      </div>
      <div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Permission</button>
      </div>
    </form>
  </div>
      </section>
      
@endsection