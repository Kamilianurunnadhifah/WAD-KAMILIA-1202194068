@extends('layout.vaccines')

@section('content')

    <section class="container">
    @if ($vaccine->count()>0)
        <!-- if data -->
            <div class="d-flex flex-column">
                <h5 class="text-center">List Vaccine</h5>
                <div class="row">
                    @foreach($vaccine as $key=>$vaccines)
                        <div class="col-4 mb-4">
                            <div class="card ">
                                <img src="{{\Storage::url('public/vaccine/').$vaccines->image}}" class="card-img-top"
                                     alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $vaccines->name }}</h5>
                                    <p class="card-description text-muted">Rp. {{ $vaccines->price }}</p>
                                    <p class="card-text">{{ $vaccines->description }}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">
                                        <a class="btn btn-primary col-12" href="patient/insert/{{$vaccines->id}}"
                                           role="button">Vaccine Now</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    @else
        <!-- if no data -->
            <div class="d-flex flex-column align-items-center">
                <p class="text-muted text-center">There is no data...</p>
                <a class="btn btn-primary col" href="/vaccine/insert" role="button">Add Vaccine</a>
            </div>
        @endif
    </section>
    <!--footer-->
    @include('include.footer-add')
    <!--End footer-->
@endsection
