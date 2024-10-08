@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Cars</div>
                <div class="card-body">
                    <a href="{{ url('/admin/cars/create') }}" class="btn btn-success btn-sm" title="Add New Car">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    <br />
                    <br />
                    <div class="table-responsive">
                        <table id="datatable" class="table table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Car Make</th>
                                    <th>Car Model</th>
                                    <th>Price</th>
                                    <th>Year</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cars as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->carMake($item->car_make_id)->name }}</td>
                                    <td>{{ $item->carModel($item->car_model_id)->name }}</td>
                                    <td>{{ number_format($item->price) }}</td>
                                    <td>{{ $item->year }}</td>
                                    <td>
                                        <a href="{{ url('/admin/cars/' . $item->id) }}" title="View Car"><button
                                                class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                                View</button></a>
                                        <a href="{{ url('/admin/cars/' . $item->id . '/edit') }}"
                                            title="Edit Car"><button class="btn btn-primary btn-sm"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                Edit</button></a>

                                        <form method="POST" action="{{ url('/admin/cars' . '/' . $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Car"
                                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                    class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection