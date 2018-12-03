@extends('layouts.backend.main_layout')
@section('title', 'Edit user')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit User</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
<div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit User
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-9">
                    <?php
                    $message=Session::get('message');
                    if ($message) {
                        echo '<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$message.'
                        </div>';
                        Session::put('message',null);
                    }
                    ?>
                    <form role="form" action="{{ url('/user/'.$user->id.'/update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                         <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label>User Name</label>
                            <input class="form-control" name="name" placeholder="example: John Doe" value="{{$user->name}}">
                            @if($errors->has('name'))
                                <div class="help-block">
                                    {{$errors->first('name')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label>User Email</label>
                            <input class="form-control" name="email" placeholder="example: john@gmail.com" value="{{$user->email}}">
                            @if($errors->has('email'))
                                <div class="help-block">
                                    {{$errors->first('email')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                            <label>User Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter a new password of user">
                            @if($errors->has('password'))
                                <div class="help-block">
                                    {{$errors->first('password')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success col-xs-12" type="submit">Save</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection