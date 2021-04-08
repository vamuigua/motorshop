@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @php
            $car_make_name = $car->carMake($car->car_make_id)->name;
            $car_model_name = $car->carModel($car->car_model_id)->name;
            @endphp
            <div class="card">
                <div class="card-header">VEHICLE: {{ strtoupper($car_make_name)}}
                    {{ strtoupper($car_model_name) }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/cars') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/cars/' . $car->id . '/edit') }}" title="Edit Car"><button
                            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Edit</button></a>

                    <form method="POST" action="{{ url('admin/cars' . '/' . $car->id) }}" accept-charset="UTF-8"
                        style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Car"
                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                aria-hidden="true"></i> Delete</button>
                    </form>

                    <br />
                    <br />

                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title">{{ strtoupper($car_make_name)}}
                                        {{ strtoupper($car_model_name) }}
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        @if (count($carImages) > 0)
                                        @foreach ($carImages as $image)
                                        <div class="col-12 col-md-6">
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
                                            <a href="{{ url('/admin/cars/' . $car->id . '/edit') }}"
                                                title="Upload Images">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Upload Images
                                                </button>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />

                    {{-- Vehicle Details --}}
                    <div class="row mb-2">
                        <div class="col-12 col-md-3">
                            <h5>Vehicle Make</h5>
                            <p><b>{{ ucfirst($car_make_name) }}</b></p>
                        </div>
                        <div class="col-12 col-md-3">
                            <h5>Vehicle Model</h5>
                            <p><b>{{ ucfirst($car_model_name) }}</b></p>
                        </div>
                        <div class="col-12 col-md-3">
                            <h5>Year</h5>
                            <p><b>{{ $car->year }}</b></p>
                        </div>
                        <div class="col-12 col-md-3">
                            <h5>Mileage</h5>
                            <p><b>{{ $car->mileage }}</b></p>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 col-md-3">
                            <h5>Body Type</h5>
                            <p><b>{{ $car->body_type }}</b></p>
                        </div>
                        <div class="col-12 col-md-3">
                            <h5>Condition</h5>
                            <p><b>{{ $car->condition_type }}</b></p>
                        </div>
                        <div class="col-12 col-md-3">
                            <h5>Transmission</h5>
                            <p><b>{{ $car->transmission_type }}</b></p>
                        </div>
                        <div class="col-12 col-md-3">
                            <h5>Price</h5>
                            <p><b>{{ number_format($car->price) }}.KSH</b></p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12 col-md-3">
                            <h5>Duty</h5>
                            <p><b>{{ $car->duty }}</b></p>
                        </div>
                        <div class="col-12 col-md-3">
                            <h5>Negotiable</h5>
                            @if ($car->negotiable == '1')
                            <p><b>Yes</b></p>
                            @else
                            <p><b>No</b></p>
                            @endif
                        </div>
                        <div class="col-12 col-md-3">
                            <h5>Fuel Type</h5>
                            <p><b>{{ $car->fuel_type }}</b></p>
                        </div>
                        <div class="col-12 col-md-3">
                            <h5>Interior</h5>
                            <p><b>{{ $car->interior_type }}</b></p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12 col-md-3">
                            <h5>Color</h5>
                            <p><b>{{ $car->color_type }}</b></p>
                        </div>
                        <div class="col-12 col-md-3">
                            <h5>Engine Size</h5>
                            <p><b>{{ $car->engine_size }} cc</b></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <h5><b>Description</b></h5>
                            <p>{{ $car->description }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h5><b>Vehicle Features</b></h5>
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
                        </div>
                    </div>
                    {{-- Vehicle Details END--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection