@extends('layout.vaccines')

@section('content')
    <section class="container">
        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="/vaccine/{{$vaccine->id}}">
            @csrf
            @method('PUT')
            <p class="text-center fw-bold">Input Vaccine</p>
            <div class="mb-3">
                <label class="form-label">Vaccine Name</label>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="text" class="form-control" name="name" id="name" value="{{old('name',$vaccine->name)}} ">
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" name="price" id="price" value="{{old('price',$vaccine->price)}} ">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <textarea type="text" class="form-control" rows="3" name="description" id="description" >{{old('description',$vaccine->description)}} </textarea>
            </div>
            <div class="mb-3 ">
                <label class="form-label d-block">Image</label>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
    <!--footer-->
        @include('include.footer-add')
    <!--End footer-->
@endsection
