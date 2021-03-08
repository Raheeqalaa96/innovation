@extends('layout')

@section('title')
    Create book
@endsection

@section('content')

@include('inc.errors')

<?php $my_msg = "hello"; ?>

<x-alert msg="this is success message" type="success"></x-alert>
<x-alert :msg="$my_msg" type="danger"></x-alert>
<x-alert msg="this is anotttther" type="info"></x-alert>

<form method="POST" action="...." enctype="multipart/form-data">

  @csrf

  <div class="form-group">
    <input type="text" name="title" class="form-control" placeholder="title" value="...">
  </div>
  
 
  <div class="form-group">
    <textarea class="form-control" name="desc" rows="3" placeholder="description">....</textarea>
  </div>

  <div class="form-group">
    <input type="file" class="form-control-file" name="img">
  </div>


  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection