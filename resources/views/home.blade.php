@extends('layouts.app')
@extends('layouts.head')
@section('content')
<div class="container">
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

<div class="row">
  @foreach($podcasts as $podcast)
    <div class="card col-md-3">
        <img src="{{asset('img/podcasts-img/' . $podcast->photo)}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$podcast->title}}</h5>
          <p class="card-text">{{$podcast->desc}}</p>
          <a href="{{route('single', $podcast->id)}}" class="btn btn-primary">Show podcast</a>
        </div>
      </div>
      @endforeach
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $('aside').height(($('aside').height())-($('nav').outerHeight()));
    console.log($('.container').outerWidth());
    console.log( ($("aside").outerWidth()));

    $('.container').css('width', ($('.container').outerWidth()) - ($("aside").outerWidth()));
</script>
@endsection
