@extends('layout.app')
@section('main_content')
    <div class="col-lg-12">
        <div class="card shadow-lg border-0" style="border-radius: 20px; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-primary m-0"><i class="fas fa-tags me-2"></i>SubCategories</h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubcategoryModal">
                        <i class="fas fa-plus-circle me-2"></i>Add SubCategory
                    </button>
                </div>
                <div class="container">
                    {!! $dataTable->table(['class' => 'table table-bordered']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addSubcategoryModal" tabindex="-1" aria-labelledby="addSubcategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addSubcategoryModalLabel">Add SubCategory</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="subcategory_add_form">
                        <div class="mb-3">
                            <label for="category_add_select" class="form-label">Choose Category</label>
                            <select class="form-select" aria-label="Default select example" id="category_add_select">
                                <option selected>Open this select menu</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="subcategory_add_input" class="form-label">SubCategory Name</label>
                            <input type="text" class="form-control" id="subcategory_add_input"
                                placeholder="Enter SubCategory Name" name="subcategoryname">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add_subcategory_image">Sub-Category Image <small class="text-danger">(200 x 200 px)</small></label>
                            <input type="file" class="form-control needsclick" id="add_subcategory_image"
                                placeholder="Sub-Category Image" accept="image/*" name="subcategory_image">
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
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
