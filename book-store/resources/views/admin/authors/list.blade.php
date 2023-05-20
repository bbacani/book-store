<h5 class="d-flex justify-content-between">
    <span>Author List</span>
</h5>

<div class="card author-list">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->author_name }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Author actions">
                                <a href="{{ route('admin.authors.edit', $author->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.authors.destroy', $author->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer text-right">
        <a href="{{ route('admin.authors.create') }}" class="btn btn-primary btn-sm">Add Author</a>
    </div>
</div>
