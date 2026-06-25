@extends('layout.app')
@section('main_content')
    <div class="col-lg-12">
        <div class="card shadow-lg border-0" style="border-radius: 20px; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-primary m-0"><i class="fas fa-award me-2"></i>Top Customers</h2>
                </div>
                <div class="container overflow-hidden">
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">





                        <thead>
                            <tr>
                                <th>S.NO</th>

                                <th>Customer Name</th>
                                <th>Phone Number</th>
                                <th>Order Count</th>
                                <th>Amount</th>


                            </tr>
                        </thead>


                        <tbody>

                            <?php $i = 1; ?>
                            @foreach ($orderdetails as $order )
                              <tr>
                                <td>{{ $i++ }}</td>
                              
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone_number }}</td>
                                <td>{{ $order->order_count }}</td>
                               <td>₹ {{ round($order->total_amount) }}.00</td>
                                </tr>
                            @endforeach






                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- ADD MODAL --}}

    {{-- EDIT MODAL --}}



@endsection

