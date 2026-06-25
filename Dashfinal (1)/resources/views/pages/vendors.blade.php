@extends('layout.app')
@section('main_content')
    <div class="col-lg-12">
        <div class="card shadow-lg border-0" style="border-radius: 20px; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-primary m-0"><i class="fas fa-user-tie me-2"></i>Vendors</h2>
                    <a href="{{ url('/vendor/addview') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-2"></i>Add Vendor
                    </a>
                </div>
                <div class="container overflow-hidden">
                    {!! $dataTable->table(['class' => 'table table-bordered table-hover nowrap']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
