@extends('layouts.master')
@section('title',"Edit")
@section('main')
<form method="POST" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label  class="form-label">Name : </label>
      <input type="text" value="{{ $product->name }}" name="name" class="form-control">
    </div>
    <div class="mb-3">
      <label  class="form-label">Description : </label>
      <textarea name="description" class="form-control">{{ $product->description }}</textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Quantité</label>
      <input type="number" value="{{ $product->quantity }}" name="quantity" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Price</label>
      <input type="text" value="{{ $product->price }}" name="price" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" name="image" class="form-control">
      <img width="100" height="100" src="{{ asset('storage/'.$product->image) }}" alt="">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
  @endsection