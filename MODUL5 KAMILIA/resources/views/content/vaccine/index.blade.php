@extends('layout.vaccines')

@section('content')

<section class="container">
    @if ($vaccine->count()>0)
        <!-- if data -->
        <div class="d-flex flex-column">
            <h5 class="text-center">List Vaccine</h5>
            <div class="mb-4">
                <a class="btn btn-primary col" href="/vaccine/insert" role="button">Add Vaccine</a>
            </div>
            <!-- table -->
            <table class="table table-primary table-striped border-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($vaccine as $key=>$vaccines)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{ $vaccines->name }}</td>
                        <td>{{ $vaccines->price }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="/vaccine/{{$vaccines->id}}" method="post">
                                <a class="btn btn-warning" href="/vaccine/{{$vaccines->id}}/edit" role="button">Edit</a>
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
    @include('include.footer')
<!--End footer-->
@endsection