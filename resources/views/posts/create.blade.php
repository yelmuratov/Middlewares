@extends('../index')

@section('content')
    <div class="container">
        <h2>Create Post</h2>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:(optional)</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <h2>Posts List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td><img src="{{ asset($post->image) }}" alt="image" width="100px" height="100px"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
