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

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th> Vehicle Make </th>
                                    <td> {{ ucfirst($car_make_name) }} </td>
                                </tr>
                                <tr>
                                    <th> Vehicle Model </th>
                                    <td> {{ ucfirst($car_model_name) }} </td>
                                </tr>
                                <tr>
                                    <th> Year </th>
                                    <td> {{ $car->year }} </td>
                                </tr>
                                <tr>
                                    <th> Body Type </th>
                                    <td> {{ $car->body_type }} </td>
                                </tr>
                                <tr>
                                    <th> Condition Type </th>
                                    <td> {{ $car->condition_type }} </td>
                                </tr>
                                <tr>
                                    <th> Transmission Type </th>
                                    <td> {{ $car->transmission_type }} </td>
                                </tr>
                                <tr>
                                    <th> Price (KSH) </th>
                                    <td> {{ number_format($car->price) }} </td>
                                </tr>
                                <tr>
                                    <th> Duty </th>
                                    <td> {{ $car->duty }} </td>
                                </tr>
                                <tr>
                                    <th> Negotiable </th>
                                    @if ($car->negotiable == '1')
                                    <td> Yes </td>
                                    @else
                                    <td> No </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th> Fuel Type </th>
                                    <td> {{ $car->fuel_type }} </td>
                                </tr>
                                <tr>
                                    <th> Interior Type </th>
                                    <td> {{ $car->interior_type }} </td>
                                </tr>
                                <tr>
                                    <th> Color Type </th>
                                    <td> {{ $car->color_type }} </td>
                                </tr>
                                <tr>
                                    <th> Engine Size (cc) </th>
                                    <td> {{ $car->engine_size }} </td>
                                </tr>
                                <tr>
                                    <th> Description </th>
                                    <td> {{ $car->description }} </td>
                                </tr>
                                <tr>
                                    <th> Features </th>
                                    <td>
                                        @if ($car->features)
                                        <ul>
                                            @foreach ($car->features as $feature)
                                            <li>
                                                {{ $feature->name }}
                                            </li>
                                            @endforeach
                                        </ul>
                                        @else
                                        <p>Missing features</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th> Images </th>
                                    @if (count($carImages) > 0)
                                    @foreach ($carImages as $image)
                                    <td>
                                        @if ($image->hasGeneratedConversion('thumb'))
                                        <img src="{{ $image->getUrl('thumb') }}" alt="{{ $image->file_name }}">
                                        @else
                                        <img src="{{ $image->getUrl() }}" alt="{{ $image->file_name }}">
                                        @endif
                                    </td>
                                    @endforeach
                                    @else
                                    <td>
                                        <p>No images Provided</p>
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection