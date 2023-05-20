<h5 class="d-flex justify-content-between">
    <span>User List</span>
    <button class="btn btn-secondary btn-sm toggle-list">Hide</button>
</h5>
<ul class="list-group user-list">
    @foreach ($users as $user)
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <li class="list-group-item">Id: {{ $user->id }}</li>
                <li class="list-group-item">Name: {{ $user->name }}</li>
                <li class="list-group-item">Email: {{ $user->email }}</li>
                <li class="list-group-item">Is Admin:
                    @if ($user->is_admin == 1)
                        Yes
                    @else
                        No
                    @endif
                </li>
            </div>
            <div d-flex>
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-lg">Edit
                </a>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                    style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</ul>
<br>
