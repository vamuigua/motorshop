@extends('layouts.headfoot')
@section('content')
    <!-- Page Content -->
    <div class="page-heading header-text">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1>Cars</h1>
              <span>Lorem ipsum dolor sit amet.</span>
            </div>
          </div>
        </div>
      </div>
  
      <div class="services">
        <div class="container">

          <form action="{{ route('search')}}" id="contact" method="GET" role="search">
            @csrf
            <div class="row">
              {{-- Condition --}}
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="condition_type">Condition:</label>
                         <select class="form-control" name="condition_type" data-toggle="tooltip" >
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
                      <select class="form-control" name="body_type" data-toggle="tooltip" >
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
        
                {{-- Price --}}
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label for="price"> Price (KSH): </label>
                    <input type="number" class="form-control" name="price" data-toggle="tooltip" placeholder="250000.Ksh" >
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
                      <input type="search" class="form-control" name="engine_size" data-toggle="tooltip" placeholder="1500cc" >
                    </div>
                </div>
                
                {{-- Color --}}
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="color_type">Color:</label>
                      <select class="form-control" name="color_type" data-toggle="tooltip" >
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
                        <select class="form-control" name="fuel_type" data-toggle="tooltip" >
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
                        <select class="form-control" name="transmission_type" data-toggle="tooltip" >
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
                        <select class="form-control" name="interior_type" data-toggle="tooltip" >
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
                        <select class="form-control" name="duty" data-toggle="tooltip" >
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
                        <select class="form-control" name="negotiable" data-toggle="tooltip" >
                          <option disabled selected>Select Negotiable</option>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                    </div>
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
            <div class="col-md-4">
              <div class="service-item">
                <img src="assets/images/product-1-720x480.jpg" alt="">
                <div class="down-content">
                  <h4>Lorem ipsum dolor sit amet</h4>
                  <div style="margin-bottom:10px;">
                    <span>
                        <del><sup>$</sup>11999 </del> &nbsp; <sup>$</sup>11779
                    </span>
                  </div>
  
                  <p>
                    <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-cube"></i> 1800 cc &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-cog"></i> Manual &nbsp;&nbsp;&nbsp;
                  </p>
                  <a href="car-details.html" class="filled-button">View More</a>
                </div>
              </div>
  
              <br>
            </div>
          </div>
  
          <br>
          <br>
  
          {{-- <nav>
            <ul class="pagination pagination-lg justify-content-center">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">«</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">»</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav> --}}

          <div>
            {{ $cars->links() }}
          </div>
        

          {{-- <div class="pagination-wrapper"> {!! $cars->appends(['search' => Request::get('search')])->render() !!} </div> --}}

          <br>
          <br>
          <br>
          <br>
        </div>
      </div>
  
@endsection