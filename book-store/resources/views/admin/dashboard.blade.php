@extends('auth.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif
                    You are logged in as an administrator!
                </div>
                
                <!-- Add Admin Dashboard Content Here -->
                <div class="card-body">
                    <h5>Admin Dashboard Content Goes Here</h5>
                    <p>For example, you could display a list of all registered users, or allow the admin to create new users, etc.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection