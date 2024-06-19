<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="kt-portlet" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Add New Shop</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="<?php echo base_url() ?>Shop" class="btn btn-secondary kt-margin-r-10">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Back</span>
                        </a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-brand" id="new_shop_save_default">
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
                    <form class="kt-form kt-form--label-right" id="add_new_shop_form" action="<?php echo base_url('Shop/create');?>" method="post">                  
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <h3 class="kt-section__title kt-section__title-lg">Shop Details</h3>
                                <div class="form-group row">
                                    <div class="col-lg-6 form-group-sub">
                                        <!--important to add the css class form-group-sub so that the validation is based on the bs grid col and not row. when dealing with control/widget validation -->
                                        <label>* Name</label>
                                        <input type="text" id="name" name="input_val[name]" class="form-control" placeholder="Enter name of shop">
                                        <span class="form-text text-muted">Please enter the name of the shop.</span>
                                    </div>
                                    <div class="col-lg-6 form-group-sub">
                                        <label>* City</label>
                                        <?php echo form_dropdown('input_val[city_id]', $dd_cities,'','id="city_id" class="form-control"'); ?>
                                        <span class="form-text text-muted">Please select the city where the shop is located.</span>
                                    </div>
                                </div>

                                <div class="form-group row">                                    
                                    <div class="col-lg-6 form-group-sub">
                                        <label>* Location Latitude</label>
                                        <input type="text" id="location_latitude" name="input_val[location_latitude]" class="form-control" placeholder="-9.482372">
                                        <span class="form-text text-muted">Please the location lattitude of the shop. This will be used by google maps to locate the shop.</span>
                                    </div>
                                    <div class="col-lg-6 form-group-sub">
                                        <label>* Location Longtitude</label>
                                        <input type="text" id="location_longtitude" name="input_val[location_longtitude]" class="form-control" placeholder="147.207273">
                                        <span class="form-text text-muted">Please the location longtitude of the shop. This will be used by google maps to locate the shop.</span>
                                    </div>
                                </div>

                                <div class="form-group row">                                    
                                    <div class="col-lg-6">
                                        <label>Website</label>
                                        <input type="text" id="website" name="input_val[website]" class="form-control" placeholder="Enter the website url">
                                        <span class="form-text text-muted">Please the website url of the shop (example: www.shopname.com.pg)</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Brief Description</label>
                                        <textarea class="form-control" id="description" name="input_val[description]" placeholder="Description..."  rows="3"></textarea>                                        
                                        <span class="form-text text-muted">Please enter a brief description about the shop.</span>
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