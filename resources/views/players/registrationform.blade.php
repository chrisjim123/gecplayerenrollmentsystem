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
            <li class="active">Registration Form</li>
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
                <li class="active"><a href="#">Registration Form</a></li>
                <li><a href="{{ url('/uploadlist?') }}">Upload Player List</a></li>
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
                  <form role="form" class="form" action="{{ url('/addrecord')}}/{{Auth::user()->id}}" method="post" id="registrationForm" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">


                     <div class="form-group">

                          <div class="col-xs-6">
                              <label for="dater"><h4>Date Of Registration</h4></label>
                              <input value="" type="date" class="form-control" name="regdate" id="upr" placeholder="" title="" required>
                          </div>
                     
                          <div class="col-xs-6">
                          <label for="pf"><h4>Profile Picture</h4></label>
                          <input type="file" id="pf" name="pf" class="form-control" accept="image/*" title="This is optional">
   <!--                        <p class="help-block">Select Profile Picture</p> -->
                          </div>
                      </div>


                    <div class="form-group">

                          <div class="col-xs-6">
                              <label for="fname"><h4>First name</h4></label>
                              <input value="" type="text" class="form-control" name="fname" id="upr" placeholder="enter first name" title="enter first name." required>
                          </div>
                     
                          <div class="col-xs-6">
                            <label for="lname"><h4>Last name</h4></label>
                              <input value="" type="text" class="form-control" name="lname" id="upr" placeholder="enter last name" title="enter last name." required>
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="bday"><h4>Birthday</h4></label>
                              <input type="date" class="form-control" name="bday" id="upr" placeholder="enter birthday" title="enter birthday." required="">
                          </div>
                   
                          <div class="col-xs-6">
                              <label for="age"><h4>Age</h4></label>
                              <input type="number" class="form-control" name="age" id="upr" placeholder="enter age" title="enter age."required="">
                          </div>
                      </div>


                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="nationality"><h4>Nationality</h4></label>
                              <input type="text" class="form-control" name="nationality" id="upr" placeholder="enter nationality" title="enter nationality." required="">
                          </div>
                   
                          <div class="col-xs-6">
                              <label for="sex"><h4>Sex</h4></label>
                              <select style="height:35px;" class="form-control" name="sex" id="upr" title="enter sex" required>
                              <option value=""> </option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              </select>
                          </div>
                      </div>

                  </div><!-- /.box-body -->
                  <br>

                  <div class="box box-primary">
                    <div class="box-header with-border">
                    <h3 class="box-title">PLAYERS PASSPORT</h3>
                  </div><!-- /.box-header -->
                  </div>

                   <div class="box-body">


                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="arrival"><h4>Date of Arrival</h4></label>
                              <input type="date" class="form-control" name="arrival" id="upr" placeholder="enter arrival" title="enter arrival." required="">
                          </div>
                   
                          <div class="col-xs-6">
                              <label for="expiry"><h4>Date of Expiry</h4></label>
                              <input type="date" class="form-control" name="expiry" id="upr" placeholder="enter expiry" title="enter expiry." required="">
                          </div>
                      </div>

                      <div class="form-group">
                          
                      <div class="col-xs-6">
                            <label for="passport"><h4>Scanned Passport</h4></label>
                            <input type="file" id="passport" name="passport" class="form-control" required="">
<!--                             <p class="help-block">Select Scanned Passport</p> -->
                          </div>
                      </div>

                  </div><!-- /.box-body --><br>


                  <div class="box box-primary">
                    <div class="box-header with-border">
                    <h3 class="box-title">AGENTS INFORMATION &nbsp;<b style="color:red; font-size: 15px;">(Note: This Section is optional.)</b></h3>
                  </div><!-- /.box-header -->
                  </div>

                   <div class="box-body">


                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="afname"><h4>First Name</h4></label>
                              <input type="text" class="form-control" name="afname" id="upr" placeholder="enter agents firts name" title="enter agents first name.">
                          </div>
                   
                          <div class="col-xs-6">
                              <label for="alname"><h4>Last Name</h4></label>
                              <input type="text" class="form-control" name="alname" id="upr" placeholder="enter agents last name" title="enter agents last name.">
                          </div>
                      </div>


                      <div class="form-group">
                          
                         
                          <div class="col-xs-6">
                          <label for="apf"><h4>Profile Picture</h4></label>
                          <input type="file" id="apf" name="apf"  class="form-control">
                          <!-- <p class="help-block">Profile Picture is optional...</p> -->
                          </div>
                  
                          <div class="col-xs-6">
                          <label for="apassport"><h4>Scanned Passport</h4></label>
                          <input type="file" id="apassport" name="apassport" class="form-control">
                        <!--   <p class="help-block">Scanned Passport is optional...</p> -->
                          </div>

                      </div>

                  </div><!-- /.box-body --><br>


                  <div class="box-footer"><br>
                    <button type="reset" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
                    <button type="submit" name="save" class="btn btn-lg  btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
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





