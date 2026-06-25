@extends('layout.app')
@section('main_content')

    <div class="col-12">
        <div class="card shadow-lg border-0" style="border-radius: 20px; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-primary m-0"><i class="fas fa-users me-2"></i>Customer</h2>
                </div>

                                         <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
                                                {{-- <th>UserId</th> --}}
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Address</th>
                                                <th>City</th>
                                            </tr>
                                            </thead>


                                            <tbody>

                                                 <?php $i=1; ?>

                                                @foreach ($customer as $custo)
                                                 <tr>
                                                <td>{{ $i++ }}</td>
                                                {{-- <td>{{ $custo->user_id }}</td> --}}
                                                <td>{{ $custo->name }}</td>
                                                <td>{{ $custo->email }}</td>
                                                <td>{{$custo->phone_number  }}</td>
                                                <td>{{ $custo->address }}</td>
                                                <td>{{ $custo->city }}</td>

                                            </tr>

                                                @endforeach


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

@endsection
