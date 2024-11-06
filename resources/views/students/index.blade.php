@extends('../index');

@section('content')
<div id="students-container" class="container mt-5">
    <h1 class="mb-4">List of Students</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Profile Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td><img src="{{ asset($student->profile_image) }}" alt="image" width="100px" height="100px" loading="lazy"></td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination links for the students list -->
    {{ $students->links() }}
</div>
@endsection