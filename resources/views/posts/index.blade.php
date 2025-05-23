@extends('layouts.sidenav')


@section('content')

      <!-- Posts -->
      <section id="posts">
        <h2 class="text-2xl font-semibold mb-4">Posts</h2>
      
    
        
      
        <!-- Post Listing Table -->
        <div class="bg-white p-6 rounded shadow">
          
          <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-semibold">Post List</h2>
            @can('create', \App\Models\Post::class)
            <a href="{{ route('posts.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
              + Create Post
            </a>
            @endcan
          </div>
          <table class="min-w-full border">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2 border">#</th>
                <th class="px-4 py-2 border">Title</th>
                <th class="px-4 py-2 border">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post )
              <tr class="text-gray-700">
                <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                <td class="px-4 py-2 border">{{ $post->title }}</td>
                
                <td class="px-4 py-2 border space-x-2">
                  @can('update', $post)
                  <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:underline">Edit</a>
                  @endcan
                  
                  {{-- form delete --}}
                  @can('delete', $post)
                  <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                  </form>
                  @endcan
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
      </section>

@endsection