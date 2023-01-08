@extends('employees.layout')
@section('content')
<div class="pull-left">
    <h2>Employee Management</h2>
</div>
<div class="row">
    <div class="col-lg-12 margin-bt">

        <div class="pull-right">
            <a class="btn btn-success" href="{{route('employees.create')}}">Create New Employees</a>

        </div>
    </div>
</div>

@if($message = Session::get('success'));
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Salary</th>
        <th>Address</th>

        <th width="280px">Action</th>
    </tr>
    @foreach($employees as $employee)
    <tr>
        <td>{{++$i}}</td>
        <td>{{$employee->name}}</td>
        <td>{{$employee->email}}</td>
        <td>{{$employee->phone}}</td>
        <td>{{$employee->role}}</td>
        <td>{{$employee->salary}}</td>
        <td>{{$employee->address}}</td>
        <td>
            <form action="{{route('employees.destroy',$employee->id)}}" method ="POST">
                <a class="btn btn-info" href="{{route('employees.show',$employee->id)}}">Show</a>
                <a class="btn btn-primary" href="{{route('employees.edit',$employee->id)}}">Edit</a>
            @csrf

            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>