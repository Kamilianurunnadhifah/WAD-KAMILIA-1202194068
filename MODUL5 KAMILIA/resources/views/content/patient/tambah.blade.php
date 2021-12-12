@extends('layout.patient')

@section('content')
<section class="container mb-4">
        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="/patient">
            @csrf
            <p class="text-center fw-bold">Input Patient</p>
            <div class="mb-3">
                <label class="form-label">Vaccine Id</label>
                <input type="text" class="form-control" readonly value="{{$vaccine->id}}" name="vaccine_id" id="vaccine_id">
            </div>
            <div class="mb-3">
                <label class="form-label">Patient Name</label>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="text" class="form-control" name="name" id="name" value="{{old('name','')}} ">
            </div>
            <div class="mb-3">
                <label class="form-label">NIK</label>
                @error('nik')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="number" class="form-control" name="nik" id="nik" value="{{old('nik','')}} ">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                @error('alamat')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="text" class="form-control" name="alamat" id="alamat" value="{{old('alamat','')}} ">
            </div>
            <div class="mb-3 ">
                <label class="form-label d-block">KTP</label>
                @error('image_KTP')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="file" name="image_KTP">
            </div>
            <div class="mb-3">
                <label class="form-label">No. Hp</label>
                @error('no_hp')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="number" class="form-control" name="no_hp" id="no_hp" value="{{old('no_hp','')}} ">
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
    <!--footer-->
    @include('include.footer-add')
    <!--End footer-->
@endsection