@extends('layouts.app')
@section('title','Edit Details for' . $customer->name)
@section('content')

<div class="row">
    <div class="col-12">
      <h1>Edit Details for {{ $customer->name }} </h1>

    </div>
</div>

<div class="row">
    <div class="col-12">
      <form action="/customers/{{ $customer->id }}" method="POST">
        @method('PATCH')  <!--cause forms can't make PUT,PATCH,DELETE -->
        @include('customers.form')


        <button type="submit" class="btn btn-primary">Add Data</button>

      </form>
  </div>
</div>
<hr>
@csrf


@endsection
