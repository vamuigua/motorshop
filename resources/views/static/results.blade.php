@extends('layouts.headfoot')
@section('content')
<!-- Page Content -->
<div class="page-heading header-text">

    <div class="container">
        {{-- @php
        $car_make_name = $cars->carMake($cars->car_make_id)->name;
        $car_model_name = $cars->carModel($cars->car_model_id)->name;
        @endphp --}}
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <th>Body_type</th>
                    <th>Condition_Type</th>
                    <th>Car_Make</th>
                    <th>Car_Model</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Negotiable</th>
                </thead>

                <tbody>
                    @foreach ($cars as $item)
                    <tr>
                        <td> {{ $item->body_type }} </td>
                        <td> {{ $item->condition_type }} </td>
                        <td> {{ $item->carMake($item->car_make_id)->name}} </td>
                        <td> {{ $item->carModel($item->car_model_id)->name}} </td>
                        <td> {{ $item->color_type}} </td>
                        <td> {{ $item->price }}</td>
                        <td> {{ $item->negotiable == 1 ? 'Yes' : 'No' }}</td>
                       
                        <td> <img src="{{ $item->images($item->car_image) }}" alt="">  </td>
                    </tr>
                    
                    @endforeach
                    
                    {{-- <tr>
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
                    </tr> --}}
                </tbody>
            </table> 
            <div>
                {{ $cars->links() }}
            </div>
        </div>
         
    </div>
</div>
@endsection