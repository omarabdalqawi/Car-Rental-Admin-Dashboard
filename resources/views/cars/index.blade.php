@extends('layouts.master')
@section('title')
Cars
@endsection
@section('content')
    <br><br>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>{{__('messages.car_list') }}</h1>
           <div>
            @can('car-create')
             <a class="btn btn-success btn-sm mb-2" href="{{ route('cars.create') }}"><i class="fa fa-plus"></i> {{__('messages.add') }}</a>
            @endcan
            </div>
        </header>
        <div>
            @session('success')
              <div class="alert alert-success" role="alert">
                {{ $value }}
              </div>
           @endsession
        </div>
        <table class="table table-bordered">
        <thead class="table-success">
            <tr>
                <th >#</th>
                <th>{{__('messages.name') }}</th>
                <th>{{__('messages.color') }}</th>
                <th>{{__('messages.type') }}</th>
                <th>{{__('messages.model') }}</th>
                <th>{{__('messages.pottynumber') }}</th>
                <th>{{__('messages.image') }}</th>
                <th>{{__('messages.Action') }}</th>
            </tr>
           </thead>
     @foreach ($data  as  $bok)
          <tbody class="">
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{$bok->namecar}}</td>
                <td>{{$bok->colorcar}}</td>
                <td>{{$bok->typecar}}</td>
                <td>{{$bok->model}}</td>
                <td>{{$bok->pottynumber}}</td>
                <td><img  src="/images/cars/{{$bok->image}}" width="150px" height="100px" id="img"></td>
                <td>
                    <form action="{{ route('products.destroy',$bok->id) }}" method="POST">
                        @can('car-edit')
                        <a class="btn btn-primary " href="{{ route('cars.edit',$bok->id) }}"><i class="fa-solid fa-pen-to-square"></i>{{__('messages.update') }}</a>
                        @endcan

                        @csrf
                        @method('DELETE')

                        @can('car-delete')
                        <button type="submit" class="btn btn-danger "><i class=" ti-trash"></i>{{__('messages.delete') }}</button>
                        @endcan
                    </form>
                </td>
            </tr>
           </tbody>
           @endforeach
        </table>
        {!! $data->links() !!}
    </div>
    @endsection
<!--
</body>
</html> -->
