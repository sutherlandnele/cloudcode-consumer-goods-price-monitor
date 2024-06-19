<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="kt-portlet" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Add New Good</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="<?php echo base_url() ?>Product" class="btn btn-secondary kt-margin-r-10">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Back</span>
                        </a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-brand" id="new_product_save_default">
                                <i class="la la-check"></i>
                                <span class="kt-hidden-mobile">Save</span>
                            </button>
                            <button type="button" class="btn btn-brand dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="la la-plus"></i> Save & New</a>
                                <a class="dropdown-item" href="#"><i class="la la-copy"></i> Save & Duplicate</a>
                                <a class="dropdown-item" href="#"><i class="la la-undo"></i> Save & Close</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="la la-close"></i> Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <form class="kt-form kt-form--label-right" id="add_new_product_form" action="<?php echo base_url('Product/create');?>" method="post">                  
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <h3 class="kt-section__title kt-section__title-lg">Good Details</h3>
                                <div class="form-group row">
                                    <!--important to add the css class form-group-sub so that the validation is based on the bs grid col and not row. when dealing with control/widget validation -->
                                    <div class="col-lg-6 form-group-sub">
                                        <label>* Name</label>
                                        <input type="text" id="name" name="input_val[name]" class="form-control" placeholder="Enter name of good">
                                        <span class="form-text text-muted">Please enter the name of the good.</span>
                                    </div>
                                    <div class="col-lg-6 form-group-sub">
                                        <label>* Good Category</label>
                                        <?php echo form_dropdown('input_val[product_category_id]', $dd_product_categories,'','id="product_category_id" class="form-control"'); ?>
                                        <span class="form-text text-muted">Please select the category of the good.</span>
                                    </div>
                                </div>
                                <div class="form-group row">                                    
                                    <div class="col-lg-6">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
                                                <div class="row form-group">
                                                    <div class="col-lg-12 form-group-sub">
                                                        <label class="">* Size</label>
                                                        <input type="text" id="size" name="input_val[size]" class="form-control" placeholder="Enter size of good. Eg. 10kg">                     
                                                        <span class="form-text text-muted">Please enter the size of the good.</span>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-lg-12">
                                                        <label>Brief Description</label>
                                                        <textarea class="form-control" id="description" name="input_val[description]"  rows="3"></textarea>
                                                        <span class="form-text text-muted">Please enter the description of the good.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Image</label>
                                        <div class="dropzone dropzone-success" action="<?php echo base_url() ?>Product/ajax_upload_image" id="image_file_dropzone">
                                                <div class="dropzone-msg dz-message needsclick">
                                                    <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                                    <span class="dropzone-msg-desc">Only jpg image files of size equal to or less than 2 MB are allowed for upload</span>
                                                </div>
                                        </div>
                                    </div>
                                </div> 
                             </div>
                        </div>  
        
                    </form>
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
</div>

<!-- end:: Content -->