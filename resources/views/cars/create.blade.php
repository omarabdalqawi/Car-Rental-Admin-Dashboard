@extends('layouts.master')
@section('title')
Cars
@endsection
@section('content')
<br><br>
<!-- start form -->
<div class="container my-5">
    <header class="d-flex justify-content-between my-4">
        <h1>{{__('messages.add') }}</h1>
        <br><br>
        <div>
            <a href="{{ route('cars.index') }}" class="btn btn-primary">{{__('messages.back') }}</a>
        </div>
    </header>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('cars.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name Car:</strong>
                <input type="text" name="namecar" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Color Car:</strong>
                <input type="text" name="colorcar" class="form-control" placeholder="Color">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type Car:</strong>
                <select name="typecar" id="" class="form-control">
                    <option value="">{{__('messages.SCT') }}</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Kia">Kia</option>
                    <option value="Nisan">Nisan</option>
                    <option value="Honday">Honday</option>
                    <option value="Daihatso">Daihatso</option>
                    <option value="Sozoka">Sozoka</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model Car:</strong>
                <input type="text" name="model" class="form-control" placeholder="Model">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pottynumber Car:</strong>
                <input type="text" name="pottynumber" class="form-control" placeholder="Pottynumber">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image Car:</strong>
                <input type="file" name="image" class="form-control" placeholder="Image">
            </div>
        </div>

        <div class="form-element my-4">
            <button type="submit" class="btn btn-primary btn-sm mb-3 mt-2"><i class="fa-solid fa-floppy-disk"></i> Create</button>
        </div>


    </form>


</div>


@endsection
