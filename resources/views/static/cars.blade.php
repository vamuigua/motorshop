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
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="condition"> Condition_Type: </label>
             
                         <select class="form-control" name="condition" data-toggle="tooltip" >
                              <option >Select Car Condition</option>
                              @foreach ($car->conditionTypes() as $optionKey => $optionValue) 
                                <option value="{{ $optionKey }}">
                                  {{ $optionValue }}
                                </option>
                              @endforeach
                         </select>

                    </div>
                </div>
        
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="bodytype"> Body_Type: </label>
             
                      <select class="form-control" name="bodytype" data-toggle="tooltip" >
                           <option  value="">Select Car Body_Type</option>
                           @foreach ($car->bodyTypes() as $optionKey => $optionValue ) 
                             <option value="{{ $optionKey}}">
                               {{ $optionValue }}
                             </option>
                           @endforeach
                           BUG
                           
                      </select>
                    </div>
                </div>
        
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="carmake"> Car_Make: </label>
                      <select name="car_make_id" class="form-control" id="car_make_id">
                        <option  value="">Select Car Make</option>  
                        @foreach ($carMakes as $carMake)
                          
                          <option value="{{ $carMake->id }}"
                            {{ (isset($car->car_make_id) && $car->car_make_id == $carMake->id) ? 'selected' : ''}}>
                            {{ $carMake->name }}</option>
                          
                        @endforeach
                      </select>
                    </div>
                </div>
        
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="carmodel"> Car_Model: </label>
             
                      <select name="car_model_id" class="form-control" id="car_model_id">
                          <option  value="">Select Car Model</option>
                          @foreach ($carMakes as $carMake)
                          @foreach ($carMake->carModels as $carModel)
                          <option value="{{ $carModel->id }}"
                            {{ (isset($car->car_model_id) && $car->car_model_id == $carModel->id) ? 'selected' : ''}}>
                            {{ $carModel->name }}</option>
                          @endforeach
                          @endforeach
                      </select>
                    </div>
                </div>
        
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label for="price"> Price: </label>
             
                    <input type="number" class="form-control" name="price" data-toggle="tooltip" placeholder="250000 Ksh" >
                           
                           
                        {{-- BUG --}}  
                  </div>
                </div>
        
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="mileage"> Mileage: </label>
             
                      <input type="number" class="form-control" name="mileage" data-toggle="tooltip" placeholder="120000  miles">
                           
                           
                           {{-- BUG --}}
                           
                      
                    </div>
                </div>
        
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="enginesize"> Engine_size: </label>
             
                      <input type="search" class="form-control" name="enginesize" data-toggle="tooltip" placeholder="1500  cc" >
                           
                           
                           {{-- BUG --}}
                           
                      
                    </div>
                </div>
        
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="colortype"> Color_Type: </label>
                      
                      <select class="form-control" name="colortype" data-toggle="tooltip" >
                           <option  value="" {{ !isset($selectedcar) ? 'selected' : ''}}>Select Car Color</option>
                           @foreach ($car->colorTypes() as $optionKey => $optionValue ) 
                             <option value="{{ $optionKey}}">
                               {{ $optionValue }}
                             </option>
                           @endforeach
                           BUG
                           
                      </select>
                    </div>
                </div>
        
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="fueltype">Fuel Type:</label>
             
                        <select class="form-control" name="fueltype" data-toggle="tooltip" >
                            <option  value="" {{ !isset($selectedcar) ? 'selected' : ''}}>Select Car fuel</option>
                            @foreach ($car->fuelTypes() as $optionKey => $optionValue ) 
                              <option value="{{ $optionKey}}">
                                {{ $optionValue }}
                              </option>
                            @endforeach
                          BUG
                        </select>
                    </div>
                </div>
        
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="transmissiontype">Transmission_type:</label>
             
                        <select class="form-control" name="transmissiontype" data-toggle="tooltip" >
                          <option  value="" {{ !isset($selectedcar) ? 'selected' : ''}}>Select Transmission Type</option>
                          @foreach ($car->transmissionTypes() as $optionKey => $optionValue ) 
                            <option value="{{ $optionKey}}">
                              {{ $optionValue }}
                            </option>
                          @endforeach
                          BUG
                        </select>
                    </div>
                </div>
        
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="interiortype">Interior Type:</label>
             
                        <select class="form-control" name="interiortype" data-toggle="tooltip" >
                          <option  value="" {{ !isset($selectedcar) ? 'selected' : ''}}>Select Interior Type</option>
                          @foreach ($car->interiorTypes() as $optionKey => $optionValue ) 
                            <option value="{{ $optionKey}}">
                              {{ $optionValue }}
                            </option>
                          @endforeach
                          BUG
                        </select>
                    </div>
                </div>
        
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="dutystatus">Duty Status:</label>
             
                        <select class="form-control" name="dutystatus" data-toggle="tooltip" >
                          <option  value="" {{ !isset($selectedcar) ? 'selected' : ''}}>Select Duty Type</option>
                          @foreach ($car->dutyTypes() as $optionKey => $optionValue ) 
                            <option value="{{ $optionKey}}">
                              {{ $optionValue }}
                            </option>
                          @endforeach
                          BUG
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
  
            <div class="col-md-4">
              <div class="service-item">
                <img src="assets/images/product-2-720x480.jpg" alt="">
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
  
            <div class="col-md-4">
              <div class="service-item">
                <img src="assets/images/product-3-720x480.jpg" alt="">
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
  
            <div class="col-md-4">
              <div class="service-item">
                <img src="assets/images/product-4-720x480.jpg" alt="">
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
  
            <div class="col-md-4">
              <div class="service-item">
                <img src="assets/images/product-5-720x480.jpg" alt="">
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
  
            <div class="col-md-4">
              <div class="service-item">
                <img src="assets/images/product-6-720x480.jpg" alt="">
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