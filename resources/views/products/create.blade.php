@extends('layouts.master')
@section('title',"Create")
@section('main')
<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label  class="form-label">Name : </label>
      <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
      <label  class="form-label">Description : </label>
      <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Quantité</label>
      <input type="number" name="quantity" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Price</label>
      <input type="text" name="price" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endsection