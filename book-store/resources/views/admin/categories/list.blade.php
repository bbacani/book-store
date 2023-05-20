<h5 class="d-flex justify-content-between">
    <span>Category List</span>
    <button class="btn btn-secondary btn-sm toggle-list">Hide</button>
</h5>
<div class="card category-list">
    <div class="card category-list">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Category actions">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="btn btn-warning btn-sm">Edit
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
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
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">Add
                Category</a>
        </div>
    </div>
</div>
<br>
