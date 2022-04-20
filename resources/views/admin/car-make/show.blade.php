@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Car Make</div>
                <div class="card-body">

                    <a href="{{ url('/admin/car-make') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/car-make/' . $carmake->id . '/edit') }}" title="Edit CarMake"><button
                            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Edit</button></a>

                    <form method="POST" action="{{ url('admin/car-make' . '/' . $carmake->id) }}" accept-charset="UTF-8"
                        style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete CarMake"
                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                aria-hidden="true"></i> Delete</button>
                    </form>
                    <br />
                    <br />

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <h2>{{ $carmake->name }} models:</h2>
                                @foreach ($carmake->carModels as $carModel)
                                <tr>
                                    <th> Model Name </th>
                                    <td> {{ $carModel->name }} </td>
                                    <th> Created </th>
                                    <td> {{ $carModel->updated_at->diffForHumans() }} </td>
                                    <th> Actions </th>
                                    <td> <a href="{{ url('/admin/car-model/' . $carModel->id) }}"
                                            title="View CarModel"><button class="btn btn-info btn-sm"><i
                                                    class="fa fa-eye" aria-hidden="true"></i> View</button></a>
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