@extends('layouts.headfoot')
@section('content')
<!-- Page Content -->
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1> Price: &nbsp; <sup>Ksh</sup> {{ $car->price }} </h1>
          <span>
            <h2>
              {{ $car->carMake($car->car_make_id)->name}}.
            </h2>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="services">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <div>
            @if (count($car->images()) > 0) 
            <img src=" {{$car->images()[0]->getUrl()}} " alt="" class="img-fluid wc-image">
            @else
            <div class="col-sm-12">
              <p><b>No image Provided!</b></p>
            </div>
            @endif
          </div>

          <br>

          <div class="row">
            @if (count($carImages) > 0)
              @foreach ($carImages as $image)
              <div class="col-10 col-md-6">
                  <a href="{{ $image->getUrl() }}" data-toggle="lightbox"
                      data-gallery="car-gallery">
                      <img src="{{ $image->getUrl('thumb') }}"
                          class="img-thumbnail img-fluid mb-2" alt="vehicle image" />
                  </a>
              </div>
              @endforeach
              @else
              <div class="col-sm-12">
                  <p><b>No images Provided!</b></p>
              </div>
            @endif
          </div>

          <br>
        </div>

        <div class="col-md-5">
          <form action="#" method="post" class="form" enctype="multipart/form-data">
            <ul class="list-group list-group-flush">
              <h3>Car Details </h3><br>
             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left">Type</span>

                       <strong class="pull-right">{{ $car->condition_type }}</strong>
                  </div>
             </li>
             {{-- car make --}}
             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left">Make</span>
                       <strong class="pull-right">{{ $car->carMake($car->car_make_id)->name}}</strong>
                  </div>
             </li>
             {{-- car Model --}}
             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left"> Model</span>
                       <strong class="pull-right">{{$car->carModel($car->car_model_id)->name}}</strong>
                  </div>
             </li>
             {{-- registration year --}}
             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left">First registration</span>
                       <strong class="pull-right"> {{ $car->year }} </strong>
                  </div>
             </li>
             {{-- Body type --}}
             <li class="list-group-item">
                    <div class="clearfix">
                        <span class="pull-left">Body</span>
                        <strong class="pull-right"> {{ $car->body_type }} </strong>
                    </div>
             </li>
             {{-- car mileage --}}
             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left">Mileage</span>
                       <strong class="pull-right"> {{ $car->mileage }} km</strong>
                  </div>
             </li>
             {{-- fuel --}}
             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left">Fuel</span>
                       <strong class="pull-right"> {{ $car->fuel_type }} </strong>
                  </div>
             </li>
             {{-- engine size --}}
             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left">Engine size</span>
                       <strong class="pull-right"> {{ $car->engine_size }} cc</strong>
                  </div>
             </li>
             {{-- Price --}}
             <li class="list-group-item">
                  <div class="clearfix">
                      <span class="pull-left">Price</span>
                      <strong class="pull-right"> {{ $car->price }} Ksh </strong>
                  </div>
             </li>
             {{-- negotiation --}}
             <li class="list-group-item">
                  <div class="clearfix">
                      <span class="pull-left">Negotiable</span>
                      <strong class="pull-right"> {{ $car->negotiable = 1 ? "Yes" : "No"  }} </strong>
                  </div>
             </li>
             {{-- duty --}}
             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left">Duty</span>
                       <strong class="pull-right"> {{ $car->duty }} </strong>
                  </div>
             </li>
             {{-- transmission --}}
             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left">Gearbox</span>
                       <strong class="pull-right"> {{ $car->transmission_type }} </strong>
                  </div>
             </li>
             {{-- interior --}}
             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left">Interior condition</span>
                       <strong class="pull-right"> {{ $car->interior_type }} </strong>
                  </div>
             </li>
             {{-- color --}}
             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left">Color</span>
                       <strong class="pull-right"> {{ $car->color_type }} </strong>
                  </div>
             </li>
            </ul>
          </form>
          <br>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-8">
          <div class="tabs-content">
            <h4>Vehicle Description</h4>
            <p>- {{ $car->description }}.</p>
            <br>
          </div>
        </div>
        <div class="col-md-4">
          <div class="tabs-content">
            <h4>Vehicle Extras</h4>
            <p>
              @if ($car->features)
              <div class="d-flex align-content-center flex-wrap">
                  @foreach ($car->features as $feature)
                  <div class="m-2">
                      <p><b><i class="fa fa-check" aria-hidden="true"></i></b> {{ $feature->name }}</p>
                  </div>
                  @endforeach
              </div>
              @else
              <p><b></b>Missing features!</b></p>
              @endif
            </p>
          </div>
          <br>
          <br>
          <div class="tabs-content">
            <h4>Contact Details</h4>
            <p>
              <span>Name</span>
              <br>
              <strong>John Smith</strong>
            </p>
            <p>
              <span>Phone</span>
              <br> 
              <strong>
                <a href="tel:123-456-789">123-456-789</a>
              </strong>
            </p>
            <p>
              <span>Mobile phone</span>
              <br>
              <strong>
                <a href="tel:456789123">456789123</a>
              </strong>
            </p>
            <p>
              <span>Email</span>
              <br>
              <strong>
                <a href="mailto:doe@gmail.com">doe@gmail.com</a>
              </strong>
            </p>
          </div>
          <br>
        </div>
      </div>
      <br>
      <br>
      <br>
    </div>
  </div>
@endsection