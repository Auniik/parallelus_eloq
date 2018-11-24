@extends('layouts.backend')

@section('admin_content')
<div class="row">
	<div class="col-lg-12">
	    <h1 class="page-header">Add News</h1>
	</div>
<!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
		    <div class="panel-heading">
		        Add Blog news
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
                <form role="form" action="{{ url('save-news')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>News Heading</label>
                        <input class="form-control" name="newsHeading"  placeholder="Enter any issue heading">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" id="summernote" name="newsDescription"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success col-xs-12" type="submit">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.col-lg-6 (nested) -->
        </div>
        </div>
    </div>
@endsection