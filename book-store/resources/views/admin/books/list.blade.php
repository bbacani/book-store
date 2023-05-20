<h5 class="d-flex justify-content-between">
    <span>Book List</span>
</h5>
<div class="card book-list">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Pages</th>
                    <th scope="col">Price</th>
                    <th scope="col">Authors</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{ $book->id }}</th>
                        <td>{{ $book->book_title }}</td>
                        <td>
                            <a href="{{ $book->book_image }}" target="_blank">
                                <img src="{{ $book->book_image }}" alt="{{ $book->book_title }}" height="50">
                            </a>
                        </td>
                        <td>{{ $book->book_description }}</td>
                        <td>{{ $book->book_pages }}</td>
                        <td>{{ $book->book_price }}</td>
                        <td>
                            @foreach ($book_authors as $book_author)
                                @if ($book_author->id == $book->id)
                                    {{ $book_author->author_name }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($book_categories as $book_category)
                                @if ($book_category->id == $book->id)
                                    {{ $book_category->category_name }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Book actions">
                                <a href="{{ route('admin.books.edit', $book->id) }}"
                                    class="btn btn-warning btn-sm">Edit
                                </a>
                                <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST"
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
        <a href="{{ route('admin.books.create') }}" class="btn btn-primary btn-sm">Add Book</a>
    </div>
</div>
