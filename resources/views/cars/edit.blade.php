@extends('layouts.master')
@section('title')
Cars
@endsection
@section('content')
<br><br>
<div class="container my-5">

    <header class="d-flex justify-content-between my-4">
        <h1>{{__('messages.edit_list') }}</h1>
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
    <form action="{{ route('cars.update',$car->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-elemnt my-4">
            <input type="text" class="form-control" name="namecar" placeholder="{{__('messages.CNA') }}"
                value="{{$car->namecar}}">
        </div>
        <div class="form-elemnt my-4">
            <input type="text" class="form-control" name="colorcar" placeholder="{{__('messages.CCA') }}"
                value="{{$car->colorcar}}">
        </div>
        <div class="form-elemnt my-4">
            <select name="typecar" id="" class="form-control">
                <option value="">{{__('messages.SCT') }}</option>
                <option value="Toyota" @if($car->typecar=="Toyota" ) {{$car->typecar }} @endif>Toyota</option>
                <option value="Kia" @if($car->typecar=="Kia" ) {{$car->typecar }} @endif>Kia</option>
                <option value="Nisan" @if($car->typecar=="Nisan" ) {{$car->typecar}} @endif>Nisan</option>
                <option value="Honday" @if($car->typecar=="Honday" ) {{$car->typecar}} @endif>Honday</option>
                <option value="Daihatso" @if($car->typecar=="Daihatso" ) {{$car->typecar}} @endif>Daihatso</option>
                <option value="Sozoka" @if($car->typecar=="Sozoka" ) {{$car->typecar }} @endif>Sozoka</option>
            </select>
        </div>

        <div class="form-elemnt my-4">
            <input type="text" class="form-control" name="model" placeholder="{{__('messages.Model') }}"
                value="{{$car->model}}">
        </div>
        <div class="form-elemnt my-4">
            <input type="text" class="form-control" name="pottynumber" placeholder="{{__('messages.CPN') }}"
                value="{{$car->pottynumber}}">
        </div>







        <div class="form-element my-4">
            <button type="submit" class="btn btn-primary btn-sm mb-2 mt-2"><i class="fa-solid fa-floppy-disk"></i>
                Edeit</button>
        </div>

    </form>


</div>
@endsection
