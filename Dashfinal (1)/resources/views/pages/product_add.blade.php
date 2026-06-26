@extends('layout.app')
@section('main_content')
    <div class="col-lg-12">
        <div class="card shadow-lg border-0" style="border-radius: 20px; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-primary m-0"><i class="fas fa-plus-circle me-2"></i>Add Product</h2>
                </div>
                <div class="container">
                    <form class="needs-validation" id="addProductForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="add_category_select">Choose Category*</label>
                                    <select class="form-select" name="category_id" id="add_category_select" required>
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->category_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Product Name*</label>
                                    <input type="text" class="form-control" id="add_product_name" name="product_name"
                                        placeholder="Product name" maxlength="50" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="subcate_size_append mt-3 mb-3">

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_description">Product alt Title*</label>
                                    <input type="text" class="form-control" id="add_product_description"
                                        name="product_desc" placeholder="Product Alt Title"
                                        maxlength="100"required>


                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_image">Product Image* <small class="text-danger">(670 x 800 px)</small></label>

                                    <input type="file" class="form-control needsclick" id="add_product_image"
                                        placeholder="Product Image" accept="image/*" name="product_image"
                                        data-validation-width="670" data-validation-height="800">
                                </div>
                            </div>

                            <label for="add_product_image" class="preview-container" id="preview-container">
                                <div class="flex justify-content-center">
                                    <div class="text-center">
                                        <i class="display-4 col-12 text-muted mdi mdi-cloud-upload"></i>
                                    </div>
                                    <div>
                                        <span class="col-12">Upload Image</span>
                                    </div>
                                </div>
                            </label>


                            <!--end::Input group-->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="add_mrp_price">MRP Price*</label>
                                    <input type="number" class="form-control" id="add_mrp_price" name="product_mrp_price"
                                        placeholder="Enter MRP Price" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="add_discount_percentage">Discount Percentage (%)*</label>
                                    <input type="number" class="form-control" id="add_discount_percentage" name="discount_percentage"
                                        placeholder="Enter Percentage (e.g., 10)" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="add_sale_price">Sale Price (Auto-calculated)*</label>
                                    <input type="text" class="form-control" id="add_sale_price" name="product_regular_price"
                                        placeholder="Sale Price" maxlength="200" readonly required>
                                </div>
                            </div>

                            <!--<div class="col-md-3">-->
                            <!--    <div class="mb-3">-->
                            <!--        <label class="form-label" for="add_material_name">Video link</label>-->
                            <!--        <input type="text" class="form-control" id="add_Video_price" name="product_video"-->
                            <!--            placeholder="Video Link" maxlength="200" >-->
                            <!--    </div>-->
                            <!--</div>-->

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="add_material_color">Content*</label>
                                    <input type="text" class="form-control" id="add_product_type" name="product_content"
                                        placeholder="Product Type" maxlength="200" required>
                                </div>
                            </div>

                            <!--<div class="col-md-3">-->
                            <!--    <div class="mb-3">-->
                            <!--        <label class="form-label" for="add_material_color">Qty</label>-->
                            <!--        <input type="text" class="form-control" id="add_product_type" name="product_quantity"-->
                            <!--            placeholder="Product Qty" maxlength="200" >-->
                            <!--    </div>-->
                            <!--</div>-->

                              {{-- <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="add_material_color">Product Details</label>
                                    <div class="summernote"></div>
                                </div>
                            </div> --}}




                        </div>





                        <div class="text-center">
                            <button class="btn btn-primary add_submit_btn mt-3" type="submit">Add product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

 @section('scripts')
<script>
    $(document).ready(function() {
        // Auto-calculate Sale Price from MRP and Discount
        function calculateSalePrice() {
            let mrp = parseFloat($('#add_mrp_price').val()) || 0;
            let discountPercent = parseFloat($('#add_discount_percentage').val()) || 0;

            if (discountPercent >= 100) {
                $('#add_sale_price').val('Invalid Discount');
                return;
            }

            if (mrp > 0 && discountPercent > 0) {
                let salePrice = mrp * (1 - (discountPercent / 100));
                $('#add_sale_price').val(salePrice.toFixed(2));
            } else if (mrp > 0 && discountPercent === 0) {
                $('#add_sale_price').val(mrp.toFixed(2));
            } else {
                $('#add_sale_price').val('');
            }
        }

        $('#add_mrp_price, #add_discount_percentage').on('input', function() {
            calculateSalePrice();
        });

    $('.summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']], // Text color option
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        colors: [
            ['#000000', '#2C3E50', '#7F8C8D', '#95A5A6', '#BDC3C7', '#ECF0F1', '#FFFFFF'], // Grayscale
            ['#E74C3C', '#C0392B', '#9B59B6', '#8E44AD', '#2980B9', '#3498DB', '#1ABC9C', '#16A085'], // Vibrant colors
            ['#27AE60', '#2ECC71', '#F1C40F', '#F39C12', '#E67E22', '#D35400', '#E74C3C', '#C0392B'], // Warm tones
            ['#DFFF00', '#FFBF00', '#FF7F50', '#DE3163', '#9FE2BF', '#40E0D0', '#6495ED', '#CCCCFF'], // Pastels
            ['#6D214F', '#B33771', '#FD7272', '#3B3B98', '#786FA6', '#574B90', '#F97F51', '#B33771'], // Deep colors
            ['#F8EFBA', '#EAB543', '#F5CD79', '#F3A683', '#E77F67', '#778BEB', '#546DE5', '#3B3B98']  // Light tones
        ]
    });
});
</script>
@endsection