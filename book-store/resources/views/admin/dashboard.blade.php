@extends('auth.template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Admin Dashboard
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <!-- Add Admin Dashboard Content Here -->
                    <div class="card-body">
                        @include('admin.users.list')
                        @include('admin.orders.list')
                        @include('admin.shipments.list')
                        @include('admin.books.list')
                        @include('admin.authors.list')
                        @include('admin.categories.list')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-list').forEach(button => {
            const list = button.parentElement.nextElementSibling;
            button.addEventListener('click', () => {
                list.classList.toggle('d-none');
                const buttonText = list.classList.contains('d-none') ? 'Show' : 'Hide';
                button.textContent = buttonText;
            });
        });
    </script>
@endsection
