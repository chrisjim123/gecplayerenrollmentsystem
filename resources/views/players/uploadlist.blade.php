@extends('layouts.guest')
@section('contentheader')

<script src="http://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Registration
            <small>Home</small>
          </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="/registrationform">Registration Form</a></li>
            <li class="active">Upload List</li>
        </ol>
        </section>
@endsection  
@section('content')

<div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Notification</strong>
                            {{ session('status') }}
                        </div>
                    @endif
</div>
   
<?php
function current_page($uri = "/") {
    return strstr(request()->path(), $uri);
}
?>

<div class="container bootstrap snippet">

        </div><!--/col-3-->
        <div class="col-sm-12">
             <ul class="nav nav-tabs">
                <li><a href="{{ url('/registrationform?') }}">Registration Form</a></li>
                <li class="active"><a href="#">Upload Player List</a></li>
              </ul><hr>
              <div class="panel-body">


            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">PLAYERS INFORMATION</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">


                     <div class="form-group">

                          <div class="col-xs-6">
                          <label for="pf"><h4>Import File</h4></label>
                          <input type="file" id="pf" class="form-control" required="">
                          <p class="help-block" style="color:red;">Note: You can only upload excel files (.xlsx, .csv)</p>
                          </div>
                      </div>


                  </div><!-- /.box-body --><br>
               

                   <div class="box-footer"><br>
                    <button type="reset" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
                    <button type="submit" class="btn btn-lg  btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
                  </div>
                </form><br>
              </div><!-- /.box -->

            
              </div>  
              </div><!--/tab-pane-->
          </div><!--/tab-content-->
        </div><!--/col-12-->
    </div><!--/row-->
                                                       
@endsection


<style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>





