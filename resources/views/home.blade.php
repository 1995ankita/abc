@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">              
            <div class="card table-responsive">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <div class="pull-right"> <a href="{{ route('user.create') }}"class="btn btn-success btn-sm float-right ">+Create</a></div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">User Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Created Time</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('m/d/Y') }}</td>
                            <td>{{ $user->created_at->format('H:i:s') }}</td>
                            <td><a href="{{ route('user.edit', $user->id) }}"class="btn btn-primary btn-sm">Edit</a></td>
                            <td><a href="{{ route('user.delete', $user->id) }}"class="btn btn-danger btn-sm">Delete</a></td> 
                            </tr>
                        @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
