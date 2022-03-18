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
          <div class="d-flex justify-content-around">
            <a href="{{route('podcasts.create')}}" class='col-md-3 btn btn-outline-primary'>Add New Podcast</a>
          </div>

          <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Desc</th>
      <th scope="col">Img</th>
      <th scope="col">Mp3</th>
      <th scope="col">Created By</th>
      <th scope="col">Progress</th>

    </tr>
  </thead>
  <tbody>
    <?php $i = 0?>
    @foreach ($podcasts as $podcast)
    <?php $i++; ?>
    <tr>
      <td>{{$i}}</td>
      <td>{{$podcast->title}}</td>
      <td>{{$podcast->desc}}</td>
      <td><img style="width:100%; height:100px;" src="{{asset('img/podcasts-img/' . $podcast->photo)}}"></td>
      <td><aduio controlls><source src="{{asset('img/mp3/podcast-mp3/' . $podcast->mp3)}}" type='audio/ogg'></aduio></td>
      <td>{{auth()->user()->name}}</td>
      <td class="d-flex justify-content-around"><a href="{{route('edit' ,$podcast->id)}}" class="btn btn-success">Edit</button>
        <a onclick="return confirm('are you sure?')" href="{{route('delete' ,$podcast->id)}}" class="btn btn-danger">Delete</button></td>

    </tr>
    @endforeach

  </tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $('aside').height(($('aside').height())-($('nav').outerHeight()));
    console.log($('.container').outerWidth());
    console.log( ($("aside").outerWidth()));

    $('.container').css('width', ($('.container').outerWidth()) - ($("aside").outerWidth()));
</script>
@endsection
