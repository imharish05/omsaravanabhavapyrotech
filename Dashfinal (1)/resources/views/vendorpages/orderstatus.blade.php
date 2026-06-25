@extends('layout.app')
@section('main_content')
 <div class="col-12">
        <div class="card shadow-lg border-0" style="border-radius: 20px; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-primary m-0"><i class="fas fa-tasks me-2"></i>Order Status</h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategoryModal">
                        <i class="fas fa-plus-circle me-2"></i>Add Status
                    </button>
                </div>
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>


                                            <tbody>

                                                 <?php $i=1; ?>

                                                @foreach ($orderstatus as $order)
                                                 <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $order->order_status }}</td>
                                                <td>
                                            <!--        <button type="button" class="btn btn-success waves-effect waves-light">-->
                                            <!--    <i class="bx bx-link-external font-size-16 align-middle me-2"></i>-->
                                            <!--</button> -->
                                             <button type="button" class="btn btn-danger waves-effect waves-light delete_order_status" data-id="{{ $order->id }}">
                                                <i class=" bx bxs-trash font-size-16 align-middle me-2"></i>
                                            </button></td>


                                            </tr>

                                                @endforeach


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>


                             <div class="modal fade" id="addcategoryModal" tabindex="-1" aria-labelledby="addcategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addcategoryModalLabel">Add Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="status_add_form">
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Status</label>
                            <input type="text" class="form-control"  name="status"
                                placeholder="Enter Status" required>
                        </div>



                        <div class="text-end gap-4">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection