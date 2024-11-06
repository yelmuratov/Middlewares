@extends('../index')

@section('content')
<div id="posts-container" class="container mt-5">
    <h1 class="mb-4">List of Posts</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td><img src="{{ asset($post->image) }}" alt="image" width="100px" height="100px" loading="lazy"></td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination links for the posts list -->
    {{ $posts->links() }}
</div>
@endsection