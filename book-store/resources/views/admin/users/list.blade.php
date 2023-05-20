<h5 class="d-flex justify-content-between">
    <span>User List</span>
</h5>

<ul class="list-group user-list">
    @foreach ($users as $user)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p><strong>ID:</strong> {{ $user->id }}</p>
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Is Admin:</strong>
                        @if ($user->is_admin == 1)
                            Yes
                        @else
                            No
                        @endif
                    </p>
                </div>
                <div class="d-flex">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-lg">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                    </form>
                </div>
            </div>
        </li>
    @endforeach
</ul>
