@extends('layouts.sidenav')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
  <!-- Users Card -->
  <div class="bg-white rounded-lg shadow p-5">
    <h2 class="text-lg font-semibold text-gray-700">Total Users</h2>
    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $userCount }}</p>
  </div>

  <!-- Roles Card -->
  <div class="bg-white rounded-lg shadow p-5">
    <h2 class="text-lg font-semibold text-gray-700">Total Roles</h2>
    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $roleCount }}</p>
  </div>

  <!-- Permissions Card -->
  <div class="bg-white rounded-lg shadow p-5">
    <h2 class="text-lg font-semibold text-gray-700">Total Permissions</h2>
    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $permissionCount }}</p>
  </div>

  <!-- Posts Card -->
  <div class="bg-white rounded-lg shadow p-5">
    <h2 class="text-lg font-semibold text-gray-700">Total Posts</h2>
    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $postCount }}</p>
  </div>
</div>

@endsection