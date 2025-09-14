@extends('layouts.master')
@section('title')
Role
@endsection
@section('content')
<main class="content">
    <div class="container my-5">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ trans('roles.role') }}</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i>{{ trans('roles.Create') }}</a>
            @endcan
        </div>
    </div>
</div>

@session('success')
    <div class="alert alert-success" role="alert">
        {{ $value }}
    </div>
@endsession

<table class="table table-bordered">
  <tr>
     <th width="100px">{{ trans('roles.No') }}</th>
     <th>{{ trans('roles.Name') }}</th>
     <th width="280px">{{ trans('roles.Action') }}</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}"><i class="fa-solid fa-list"></i>{{ trans('roles.Show') }}</a>
            @can('role-edit')
                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="ti-solid ti-pen-to-square"></i>{{ trans('roles.Edit') }}</a>
            @endcan

            @can('role-delete')
            <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid ti-trash"></i> {{ trans('roles.Delete') }}</button>
            </form>
            @endcan
        </td>
    </tr>
    @endforeach
</table>

{!! $roles->links('pagination::bootstrap-5') !!}

    </div>
</main>
@endsection
