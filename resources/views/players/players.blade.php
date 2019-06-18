@extends('layouts.guest')
@section('contentheader')

<script src="http://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Players
            <small>Home</small>
          </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Players</li>
        </ol>
        </section>
@endsection  
@section('content')

   
<?php
function current_page($uri = "/") {
    return strstr(request()->path(), $uri);
}
?>


<form id="minusplayerform" action="{{route('search')}}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">  
<div class="row">      
<div class="col-xs-12">
  <div class="input-group">
   <input style="height: 40px; font-size: 30px;" id="isearch" autofocus="" class="form-control" name="isearch" placeholder="Search here: Player's first name or last name..." type="text"><span class="input-group-btn"><button style="height: 40px;" id="search" name="serach" class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-search"></i></button></span>
  </div>
</div>
</div>
</form>



<div class="row"><!-- Players Row -->
@if(isset($data))
@foreach($data as $player)
<div class="col-md-6">
<!-- Widget: user widget style 1 -->
  <div class="box box-widget widget-user">
<!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-white-active">
    <h3 class="widget-user-username" id="upr">{{$player->fname}} {{$player->lname}}</h3>
    <h5 class="widget-user-desc"></h5><b>{{$player->nationality}} </b></h5><br>
    <h5 class="widget-user-desc"></h5><b>{{$player->age}} </b></h5><br>
    </div>
    <!-- Players Profile Picture -->
    <div class="widget-user-image">
    <img class="img-circle" src="{{asset('uploads/playerspf')}}/{{$player->profilepic}}" alt="User Avatar" title="Players Profile Picture">
    </div>

    <div class="box-footer bg-gray-active">
    <div class="row">
    <div class="col-sm-12 border-center">
    <div class="description-block">
    <a href="playerpf/{{$player->id}}"><button class="btn btn-sm btn-success"><i class="glyphicon glyphicon-search"  {{ (current_page("home")) ? 'class=active' : '' }}></i> View Details</button></a>
    <span class="description-text"> </span>
    </div> 
    </div> 
    </div><!-- /.row -->
    </div>
  </div><!-- /.widget-user -->
</div><!-- /.col --> 
     
@endforeach
<div class="row">   
<div class="col-md-12"><hr>          
<center>{{$data->links()}}</center>
</div>
</div>
@else
<center style="color:red; font-size: 20px;">{{ $message }}</center>
@endif
</div><!-- End Players Row -->

@endsection

<style>

#uprall {
    text-transform:uppercase;
}

#upr {
    text-transform:capitalize;
}
</style>











