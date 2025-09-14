@extends('layouts.master')
@section('title')
User
@endsection
@section('content')
<main class="content">
    <div class="container my-5">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ trans('users.user') }}</h2>
        </div>
        <div class="pull-right">
            @can('user-create')
            <a class="btn btn-success mb-2" href="{{ route('users.create') }}"><i class="fa fa-plus"></i>{{ trans('users.Create') }}</a>
            @endcan
        </div>
    </div>
</div>
<br><br>

@session('success')
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ $value }}
    </div>
@endsession

<table class="table table-bordered">
   <tr>
       <th>{{ trans('users.No') }}</th>
       <th>{{ trans('users.Name') }}</th>
       <th>{{ trans('users.Email') }}</th>
       <th>{{ trans('users.Roles') }}</th>
       <th width="280px">{{ trans('users.Action') }}</th>
   </tr>
   @foreach ($data as $key => $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
               <label class="badge bg-success">{{ $v }}</label>
            @endforeach
          @endif
        </td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="ti-solid ti-list">{{ trans('users.Show') }}</i></a>
            @can('user-edit')
            <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="ti-solid ti-pen-to-square"></i>{{ trans('users.Edit') }}</a>
            @endcan

            <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                  @csrf
                  @method('DELETE')
                  @can('user-delete')
                  <button type="submit" class="btn btn-danger btn-sm"><i class="ti-solid ti-trash"></i>{{ trans('users.Delete') }}</button>
                  @endcan
              </form>
        </td>
    </tr>
 @endforeach
</table>

{!! $data->links('pagination::bootstrap-5') !!}
    </div>
</main>
@endsection
{{-- </x-app-layout> --}}
