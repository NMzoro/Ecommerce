@extends('layouts.master')
@section('title','HomePage')
@section('main')
<h2>Product List : </h2>
<a class="btn btn-primary" href="{{ route('products.create') }}">Create</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Quantité</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col" align="center" colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($products as $product =>$key)
        <tr>
            <td scope="row">{{ $product + 1 }}</td>
            <td scope="row">{{ $key->name }}</td>
            <td scope="row">{{ $key->description }}</td>
            <td scope="row">{{ $key->quantity }}</td>
            <td scope="row">{{ $key->price }}</td>
            <td scope="row"><img width="100" height="100" src="{{ asset('storage/'.$key->image) }}"alt="{{ $key->image }}"></td>
            <td><a data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $key->id }}">Delete</a></td>
            <td><a href="{{ route('products.edit',$key->id) }}">Update</a></td>
          </tr>
          <!-- Modal -->
<div class="modal fade" id="deleteModal_{{ $key->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure do you want to delete this product ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="{{ route('products.destroy',$key->id) }}" method="POST">
            @csrf
            @method('DELETE')
          <button type="submit" class="btn btn-primary">Delete</button>        
        </form>
        </div>
      </div>
    </div>
  </div>  
        @empty
            <tr>
                <td colspan="7" align="center">No data Available</td>
            </tr>
        @endforelse
    </tbody>
  </table>
  {{ $products->links() }}

@endsection