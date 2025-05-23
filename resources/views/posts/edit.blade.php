@extends('layouts.sidenav')


@section('content')

      <!-- Posts -->
      <section id="posts">
        <h2 class="text-2xl font-semibold mb-4">Posts</h2>
      
        <!-- Post Form -->
        <div class="bg-white p-6 rounded shadow mb-6">
          <h3 class="text-xl font-semibold mb-4">Create / Edit Post</h3>
          <form class="space-y-4">
            <div>
              <label class="block text-gray-700">Title</label>
              <input type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="Post Title">
            </div>
            <div>
              <label class="block text-gray-700">Content</label>
              <textarea class="w-full p-2 border border-gray-300 rounded" placeholder="Post Content" rows="5"></textarea>
            </div>
            <div>
              <label class="block text-gray-700">Author</label>
              <input type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="Author Name">
            </div>
            <div>
              <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Post</button>
            </div>
          </form>
        </div>
        
      

      </section>

@endsection