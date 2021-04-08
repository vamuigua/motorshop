@extends('layouts.headfoot')
@section('content')
<!-- Page Content -->
<div class="page-heading header-text">

    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <th>Body_type</th>
                    <th>Condition_Type</th>
                    <th>Car_Make</th>
                    <th>Car_Model</th>
                </thead>

                <tbody>
                    @foreach ($car as $item)
                    
                        <td> {{ $item->body_type }} </td>
                        <td> {{ $item->condition_type }} </td>
                    
                    @endforeach
                    @foreach ($carMakes as $carMake)
                    

                        <td>{{ $carMake->name}}</td>
                    
                    @endforeach
                    @foreach ($carMake->carModels as $carModel)
                    

                        <td>{{$carModel->name}}</td>
                    
                       
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
                {{ $car->links() }}
            </div>
        </div>
         
    </div>
</div>
@endsection