@extends('layouts.headfoot')
@section('content')
<!-- Page Content -->
<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Cars</h1>
        <span>Checkout what's in stock!</span>
      </div>
    </div>
  </div>
</div>

<div class="services">
  <div class="container">

    {{-- Error/Danger Alert --}}
    @if(session()->has('flash_message_error'))
    <div class="alert alert-danger" role="alert">
      <strong>Error:</strong> {{ session()->get('flash_message_error')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    <form action="{{ route('search')}}" id="contact" method="GET" role="search">
      @csrf
      <div class="row">
        {{-- Condition --}}
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="condition_type">Condition:</label>
            <select class="form-control" name="condition_type" data-toggle="tooltip">
              <option disabled selected>Select Car Condition</option>
              @foreach ($car->conditionTypes() as $condition)
              <option value="{{ $condition }}">
                {{ $condition }}
              </option>
              @endforeach
            </select>
          </div>
        </div>

        {{-- Body Type --}}
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="body_type">Body Type:</label>
            <select class="form-control" name="body_type" data-toggle="tooltip">
              <option disabled selected>Select Car Body Type</option>
              @foreach ($car->bodyTypes() as $bodyType )
              <option value="{{ $bodyType}}">
                {{ $bodyType }}
              </option>
              @endforeach
            </select>
          </div>
        </div>

        {{-- Car Make --}}
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="carmake">Car Make:</label>
            <select name="car_make_id" class="form-control">
              <option disabled selected>Select Car Make</option>
              @foreach ($carMakes as $carMake)
              <option value="{{ $carMake->id }}">
                {{ $carMake->name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        {{-- Car Model --}}
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="carmodel">Car Model:</label>
            <select name="car_model_id" class="form-control">
              <option disabled selected>Select Car Model</option>
              @foreach ($carMakes as $carMake)
              @foreach ($carMake->carModels as $carModel)
              <option value="{{ $carModel->id }}">
                {{ $carModel->name }}</option>
              @endforeach
              @endforeach
            </select>
          </div>
        </div>

        {{-- Mileage --}}
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="mileage">Mileage (KM):</label>
            <input type="number" class="form-control" name="mileage" data-toggle="tooltip" placeholder="120000 km">
          </div>
        </div>

        {{-- Enigne Size --}}
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="engine_size">Engine size:</label>
            <input type="search" class="form-control" name="engine_size" data-toggle="tooltip" placeholder="1500cc">
          </div>
        </div>

        {{-- Color --}}
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="color_type">Color:</label>
            <select class="form-control" name="color_type" data-toggle="tooltip">
              <option disabled selected>Select Car Color</option>
              @foreach ($car->colorTypes() as $colorType )
              <option value="{{ $colorType }}">
                {{ $colorType }}
              </option>
              @endforeach
            </select>
          </div>
        </div>

        {{-- Fuel Type --}}
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="fueltype">Fuel Type:</label>
            <select class="form-control" name="fuel_type" data-toggle="tooltip">
              <option disabled selected>Select Car fuel</option>
              @foreach ($car->fuelTypes() as $fuelType )
              <option value="{{ $fuelType}}">
                {{ $fuelType }}
              </option>
              @endforeach
            </select>
          </div>
        </div>

        {{-- Transmission --}}
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="transmissiontype">Transmission:</label>
            <select class="form-control" name="transmission_type" data-toggle="tooltip">
              <option disabled selected>Select Transmission Type</option>
              @foreach ($car->transmissionTypes() as $transmissionType)
              <option value="{{ $transmissionType}}">
                {{ $transmissionType }}
              </option>
              @endforeach
            </select>
          </div>
        </div>

        {{-- Interior Type --}}
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="interior_type">Interior:</label>
            <select class="form-control" name="interior_type" data-toggle="tooltip">
              <option selected disabled>Select Interior Type</option>
              @foreach ($car->interiorTypes() as $interior )
              <option value="{{ $interior}}">
                {{ $interior }}
              </option>
              @endforeach

            </select>
          </div>
        </div>

        {{-- Duty Type --}}
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="duty">Duty Type:</label>
            <select class="form-control" name="duty" data-toggle="tooltip">
              <option disabled selected>Select Duty</option>
              @foreach ($car->dutyTypes() as $dutyType)
              <option value="{{ $dutyType }}">
                {{ $dutyType }}
              </option>
              @endforeach
            </select>
          </div>
        </div>

        {{-- Year --}}
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="year">Year:</label>
            <input class="form-control" name="year" type="text" id="datepicker" placeholder="e.g 2021"
              value="{{ old('year')}}">
          </div>
        </div>

        {{-- Negotiable --}}
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="negotiable">Negotiable:</label>
            <select class="form-control" name="negotiable" data-toggle="tooltip">
              <option disabled selected>Select Negotiable</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
          </div>
        </div>
      </div>

      {{-- Price --}}
      <div class="col-sm-12">
        <div class="form-group">
          <label for="price" class="py-3"> Price Range (KSH): </label>
          <input type="text" class="js-range-slider form-control" name="price">
        </div>
      </div>

      <div class="col-sm-4 offset-sm-4">
        <div class="main-button text-center">
          <button type="submit" class="filled-button btn btn-primary">Search</button>
        </div>
      </div>
      <br>
      <br>
    </form>

    <div class="row">
      @if (count($cars) > 0)
      @foreach ($cars as $car)
      <div class="col-md-4">
        <div class="service-item">
          @if (count($car->images()) > 0)
          <img src="{{$car->images()[0]->getUrl()}}" class="img-fluid" alt="car image">
          @else
          <div class="col-sm-9">
            <div class="d-flex justify-content-center">
              <img src="/images/no-image-available.png" class="img-fluid" alt="no-image-available.png">
            </div>
          </div>
          @endif
          <div class="down-content">
            <h4>{{ $car->carMake($car->car_make_id)->name}} {{$car->carModel($car->car_model_id)->name}}</h4>
            <div style="margin-bottom:10px;">
              <span>
                {{ number_format($car->price) }}.KSH
              </span>
            </div>
            <p>
              <i class="fa fa-dashboard"></i> 1{{ number_format($car->mileage) }} km &nbsp;&nbsp;&nbsp;
              <br>
              <i class="fa fa-cube"></i> {{ number_format($car->engine_size) }} cc &nbsp;&nbsp;&nbsp;
              <br>
              <i class="fa fa-cog"></i> {{ $car->transmission_type }} &nbsp;&nbsp;&nbsp;
            </p>
            <a href="{{ route('car-details', ['id' => $car->id]) }}" class="filled-button">View More</a>
          </div>
        </div>

        <br>
      </div>
      @endforeach
      @else
      <div class="col-sm-12">
        <div class="alert alert-danger" role="alert">
          <strong>Sorry!</strong> Search results not found for your car specifications.
        </div>
      </div>
      @endif
    </div>

    <br>
    <br>
    <div class="d-flex">
      <div class="mx-auto">
        {{ $cars->links() }}
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
  </div>
</div>

@section('scripts')
<!--Ion Range Plugin JavaScript file-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>

<script lang="text/javascript">
  jQuery(function() {
      $(".js-range-slider").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 10000000,
        from: 0,
        to: 10000000,
        step: 10000,
        prettify_enabled: true,
        prettify_separator: ",",
        prefix: "KSH.",
        skin: "round"
      });
  });
</script>
@endsection

@endsection