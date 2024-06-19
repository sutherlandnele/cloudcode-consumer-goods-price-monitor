<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="kt-portlet" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Add New Shop Good</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="<?php echo base_url() ?>ShopProduct" class="btn btn-secondary kt-margin-r-10">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Back</span>
                        </a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-brand" id="new_shop_product_save_default">
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
                    <form class="kt-form kt-form--label-right" id="add_new_shop_product_form" action="<?php echo base_url('ShopProduct/create');?>" method="post">                  
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <h3 class="kt-section__title kt-section__title-lg">Shop Good Details</h3>
                                <!-- <div class="form-group form-group-last kt-hide">
                                    <div class="alert alert-danger" role="alert" id="kt_form_1_msg">
                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                        <div class="alert-text">
                                            Oh snap! Change a few things up and try submitting again.
                                        </div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="la la-close"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <!--important to add the css class form-group-sub so that the validation is based on the bs grid col and not row. when dealing with control/widget validation -->
                                    <div class="col-lg-6 form-group-sub">
                                        <label class="">* Shop</label>
                                        <?php echo form_dropdown('input_val[shop_id]', $dd_shops,'','id="shop_id" class="form-control kt_selectpicker" data-live-search="true"'); ?>    
                                        <span class="form-text text-muted">Please select the shop where the good is sold.</span>
                                    </div>
                                    <div class="col-lg-6 form-group-sub">
                                        <label class="">* Product</label>
                                        <?php echo form_dropdown('input_val[product_id]', $dd_products,'','id="product_id" class="form-control kt_selectpicker" data-live-search="true"'); ?>    
                                        
                                        <span class="form-text text-muted">Please select the product sold.</span>
                                    </div>
                                </div>
                                <div class="form-group row">                                  
                                     <div class="col-lg-6 form-group-sub">
                                        <label>* Current Price</label>
                                        <input name="input_val[current_price]" value="0.00" id="current_price" type="text" class="form-control" placeholder="Enter current price of good">
                                        <span class="form-text text-muted">Please enter the currect price of the good.</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Discount Price</label>
                                        <input type="text" value="0.00" id="discount_price" name="input_val[discount_price]" class="form-control" placeholder="Enter discount price of good">
                                        <span class="form-text text-muted">Please enter the discount price of the good.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Discount Price Start</label>
                                        <div class="input-group date">
                                            <input type="text" value="" id="discount_price_start" name="input_val[discount_price_start]" class="form-control" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted">Please enter/select the dicount price start date.</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Discount Price End</label>
                                        <div class="input-group date">
                                            <input type="text" value="" id="discount_price_end" name="input_val[discount_price_end]" class="form-control" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted">Please enter/select the dicount price end date.</span>
                                    </div>                                   
                                </div>
                                <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Brief Description</label>
                                            <textarea class="form-control" id="description" name="input_val[description]"  rows="3"></textarea>
                                            <span class="form-text text-muted">Please enter the description of the good.</span>                                        
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