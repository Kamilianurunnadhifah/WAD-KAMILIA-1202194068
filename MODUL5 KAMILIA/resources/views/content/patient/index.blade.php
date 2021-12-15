@section('content')

<section class="container">
    @if ($patient->count()>0)
        <!-- if data -->
        <div class="d-flex flex-column">
            <h5 class="text-center">List Pattient</h5>
            <div class="mb-4">
                <a class="btn btn-primary col" href="vaccine/list" role="button">Register Patient</a>
            </div>
            <!-- table -->
            <table class="table table-primary table-striped border-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Vaccine</th>
                        <th scope="col">Name</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. Hp</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patient as $key=>$patients)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>
                            @foreach ($vaccine as $key=>$vaccines)
                                @if($vaccines->id== $patients->vaccine_id)
                                    {{ $vaccines->name }},
                                @endif
                            @endforeach
                            </td>
                            <td>{{ $patients->name }}</td>
                            <td>{{ $patients->nik}}</td>
                            <td>{{ $patients->alamat}}</td>
                            <td>{{ $patients->no_hp }}</td>
                            <td>
                                <form action="/patient/{{$patients->id}}" method="post">
                                    <a class="btn btn-warning" href="/patient/{{$patients->id}}/edit" role="button">Edit</a>
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
                <a class="btn btn-primary col" href="vaccine/list" role="button">Register Patient</a>
            </div>
    @endif
</section>
<!--footer-->
    @include('include.footer')
<!--End footer-->
@endsection
