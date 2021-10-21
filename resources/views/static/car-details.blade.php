@extends('layouts.headfoot')
@section('content')
<!-- Page Content -->
<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1> Price: &nbsp; <sup>Ksh</sup> {{ number_format($car->price) }} </h1>
        <span>
          <h2>
            {{ $car->carMake($car->car_make_id)->name}} {{ $car->carModel($car->car_model_id)->name}}.
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
        @if (count($car->images()) > 0)
        <div>
          <img src="{{$car->images()[0]->getUrl()}}" alt="car-image" class="img-fluid wc-image">
        </div>
        <br>

        <div class="row">
          @foreach ($carImages as $image)
          <div class="col-sm-4 col-6">
            <a href="{{ $image->getUrl() }}" data-toggle="lightbox" data-gallery="car-gallery">
              <img src="{{ $image->getUrl('thumb') }}" class="img-thumbnail img-fluid mb-2" alt="car-thumbmail" />
            </a>
          </div>
          @endforeach
        </div>

        @else
        <div class="col-sm-12">
          <div class="d-flex justify-content-center">
            <img src="/images/no-image-available.png" class="img-fluid" alt="no-image-available.png">
          </div>
        </div>
        @endif

        <br>

      </div>
      <div class="col-md-5">
        <ul class="list-group list-group-flush">
          <h3>Car Details </h3><br>
          <li class="list-group-item">
            <div class="clearfix">
              <span class="pull-left">Condition</span>
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
              <strong class="pull-right"> {{ number_format($car->mileage) }} km</strong>
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
              <strong class="pull-right"> {{ number_format($car->price) }} Ksh </strong>
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
        <br>
      </div>
    </div>

    <br>

    <div class="row">
      <div class="col-md-8">
        <div class="tabs-content">
          <h4>Vehicle Description</h4>
          <p>{{ $car->description }}</p>
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
      </div>
    </div>
    <br>
    <br>
    <br>
  </div>
</div>
@endsection