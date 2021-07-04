@extends('front.layouts.app')
@section('title')
Dashboard
@endsection
@section('content')
<div class="row mt-2">
    <div class="col-md-9">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('img/1.jpg')}}" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis, blanditiis!</p>
                </div>
              </div>

              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/2.jpg')}}" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis, blanditiis!</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          {{-- Recent Note section --}}
          <div class="mt-4">
            <h5><strong> Recent Notes </strong></h5>
            <hr>
            <div class="row">

                <div class="col-md-3">
                    <a href="">Note title one</a>
                </div>
                <div class="col-md-3">
                    <a href="">Note title one</a>
                </div>
                <div class="col-md-3">
                    <a href="">Note title one</a>
                </div>
                <div class="col-md-3">
                    <a href="">Note title one</a>
                </div>
            </div>
          </div>
          {{-- end recent note section --}}
    </div>

    <div class="col-md-3 pl-1">
        <div class="card" style="box-shadow: 0 0 10px 0 rgb(44 83 217 / 30%); border-radius: 10px; height:100vh;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Cras justo odio</li>
              <li class="list-group-item">Dapibus ac facilisis in</li>
              <li class="list-group-item">Vestibulum at eros</li>
            </ul>
            <div class="card-body">
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>
</div>
@endsection
