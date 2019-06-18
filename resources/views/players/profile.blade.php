@extends('layouts.guest')
@section('contentheader')

<script src="http://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Players Profile
            <small>Home</small>
          </h1>

        <ol class="breadcrumb">
            <li><a href="{{url('/player?')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Players Profile</li>
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
}?>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{asset('uploads/playerspf')}}/{{$player->profilepic}}" alt="User profile picture">
                  <h3 class="profile-username text-center" id="upr">{{$player->fname}} {{$player->lname}}</h3>
                  <p class="text-muted text-center">{{$player->nationality}}</p>

                 <!--  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Followers</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                      <b>Following</b> <a class="pull-right">543</a>
                    </li>
                    <li class="list-group-item">
                      <b>Friends</b> <a class="pull-right">13,287</a>
                    </li>
                  </ul> -->

                  <a href="#" class="btn btn-primary btn-block"><b>Update Profile Picture</b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Agents Information</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  First Name</strong>
                  <p class="text-muted">
                    {{$player->bday}}
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Age</strong>
                  <p class="text-muted">{{$player->age}}</p>

                  <hr>
<!-- 
                  <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                  <p>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                  </p>

                  <hr> -->

 <!--                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#basicinfo" data-toggle="tab">Basic Information</a></li>
                  <li><a href="#passport" data-toggle="tab">Passport Information</a></li>
                  <li><a href="#timeline" data-toggle="tab">Buyin History</a></li>
                  <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">

                  <div class="active tab-pane" id="basicinfo">
                    
                  <div class="row">
                  <div class="col-xs-6">
                  <label for="fname"><h4>First Name</h4></label>
                  <input style="background: white;" type="text" class="form-control" name="fname" id="upr" disabled="" value="{{$player->fname}}">
                  </div>

                  <div class="col-xs-6">
                  <label for="lname"><h4>Last Name</h4></label>
                  <input style="background: white;" type="text" class="form-control" name="lname" id="upr" disabled="" value="{{$player->lname}}">
                  </div>
                  </div>

                 <div class="row">
                  <div class="col-xs-6">
                  <label for="bday"><h4>Birth Date</h4></label>
                  <input style="background: white;" type="text" class="form-control" name="bday" id="upr" disabled="" value="{{$player->bday}}">
                  </div>

                   <div class="col-xs-6">
                  <label for="age"><h4>Age</h4></label>
                  <input style="background: white;" type="text" class="form-control" name="age" id="upr" disabled="" value="{{$player->age}}">
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-xs-6">
                  <label for="sex"><h4>Sex</h4></label>
                  <input style="background: white;" type="text" class="form-control" name="sex" id="upr" disabled="" value="{{$player->sex}}">
                  </div>

                   <div class="col-xs-6">
                  <label for="nationality"><h4>Nationality</h4></label>
                  <input style="background: white;" type="text" class="form-control" name="nationality" id="upr" disabled="" value="{{$player->nationality}}">
                  </div>
                  </div>
    
                  </div><!-- /.tab-pane --><br>




                  <div class="tab-pane" id="passport">
                    
                  <div class="row">
                  <div class="col-xs-6">
                  <label for="fname"><h4>Date Arrival</h4></label>
                  <input style="background: white;" type="text" class="form-control" name="fname" id="upr" disabled="" value="{{$player->date_arrival}}">
                  </div>

                  <div class="col-xs-6">
                  <label for="lname"><h4>Date Expiry</h4></label>
                  <input style="background: white;" type="text" class="form-control" name="lname" id="upr" disabled="" value="{{$player->date_expiry}}">
                  </div>
                  </div><hr>

                  <div class="row">
                  <div class="col-xs-12">
<!--                   <p class="help-block">Click the thumbnail below to zoom in the Passport.</p>
 -->                <!--   <center><img style="width:200px; height:200px;" src="{{asset('uploads/playerspassport')}}/{{$player->image}}"> --> 
                   <a data-toggle="modal" data-target="#passportimg" type="button" href="#" class="btn btn-md btn-default btn-block"><b>View Passport Image</b></a></center>

                  </div>
                  </div><hr>
              
                  </div><!-- /.tab-pane --><br>



                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs">Read more</a>
                            <a class="btn btn-danger btn-xs">Delete</a>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-user bg-aqua"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                          <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-comments bg-yellow"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-camera bg-purple"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                      </li>
                    </ul>
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->




<div class="modal fade" id="passportimg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Players Passport</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<hr>
<center><img style="width:500px; height:500px;" src="{{asset('uploads/playerspassport')}}/{{$player->image}}">
</center>
<hr>
  </div>
  </div>
</div>

@endsection

<style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>