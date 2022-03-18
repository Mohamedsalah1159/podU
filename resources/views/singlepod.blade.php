@extends('layouts.app')
@extends('layouts.head')
@section('content')
<div class="container">
      @if (session()->has('Success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@if (session()->has('Error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
        <aside>
            <nav>
              <ul>
                <a href="{{route('home')}}"><li>Home</li></a>
                <a href="{{url('podcasts')}}"><li>Podcasts</li></a>
                <a href="#"><li>Experience</li></a>
                <a href="#"><li>About</li></a>
              </ul>
            </nav>
          </aside>
          <form  method="post" enctype='multipart/form-data' >
          {{ method_field('POST') }}
              @csrf
  <div class="mb-3">
  <img style="width:200px; height:200px;" src="{{asset('img/podcasts-img/' . $podcast->photo)}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" value='{{$podcast->title}}' name="title" aria-describedby="emailHelp" disabled>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Desc</label>
    <input type="text" class="form-control" name="desc" value='{{$podcast->desc}}' id="exampleInputPassword1" disabled>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mp3</label>
    <aduio controlls><source src="{{asset('img/mp3/podcast-mp3/' . $podcast->mp3)}}" type='audio/ogg'></aduio>  </div>

</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $('aside').height(($('aside').height())-($('nav').outerHeight()));
    console.log($('.container').outerWidth());
    console.log( ($("aside").outerWidth()));

    $('.container').css('width', ($('.container').outerWidth()) - ($("aside").outerWidth()));
</script>
@endsection
