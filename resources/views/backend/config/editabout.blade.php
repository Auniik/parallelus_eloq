@extends('layouts.backend')

@section('admin_content')

<div class="row">
	<div class="col-lg-12">
	    <h1 class="page-header">Update About</h1>
	</div>
<!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
		    <div class="panel-heading">
		        Basic Site Configuration
    		</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-8">
                <?php
                    $message=Session::get('message');
                    if ($message) { 
                        echo '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$message.'
                              </div>'; 
                        Session::put('message',null);
                    }
                ?>
                <form role="form" action="{{ url('save-about')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>About Heading</label>
                        <input class="form-control" name="aboutHeading" value="{{$about==null ? '' : $about->about_heading}}"  placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label>Discription</label>
                        <textarea class="form-control" id="summernote" name="aboutText" placeholder="Enter your quote">{{$about==null ? '' : $about->about_text}}</textarea>
                    </div>
                    <div class="form-group">
                        {{-- <input type="hidden" name="config_id" value="{{$about->config_id}}"> --}}
                        <button class="btn btn-success col-xs-12" type="submit">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.col-lg-6 (nested) -->
        </div>
        </div>
    </div>
</div>
@endsection