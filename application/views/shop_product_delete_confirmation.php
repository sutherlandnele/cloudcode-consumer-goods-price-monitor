<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
        <div class="col-lg-12">
            <?php if (count($shop_product) > 0) { ?>
                <!--begin::Portlet-->
                <div class="kt-portlet" id="kt_page_portlet">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Shop Good Deletion Confirmation</h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="btn-group">
                                <a type="button" class="btn btn-brand" href="<?php echo base_url() ?>ShopProduct">
                                    <i class="la la-arrow-left"></i>
                                    <span class="kt-hidden-mobile">Back</span>
                                </a>
                                <button type="button" class="btn btn-brand dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Confirm delete?
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" id="shop_product_delete_yes"><i class="la la-check"></i> Yes</a>    
                                    <div class="dropdown-divider"></div>                               
                                    <a class="dropdown-item" href="<?php echo base_url() ?>shopproduct"><i class="la  la-hand-stop-o"></i> No</a>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <form class="kt-form kt-form--label-right" id="delete_shop_product_confirmation_form" action="<?php echo base_url('ShopProduct/delete');?>" method="post">                        
                        <div class="kt-section kt-section">
                        <div class="kt-section__body">
                                <h3 class="kt-section__title kt-section__title-lg">Shop Good Details</h3>
                                <div class="row form-group">                                    
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">                                                
                                                <div class="row">
                                                    <div class="col-lg-12">                                                       
                                                        <label>Shop:</label>
                                                        <label class="kt-font-bold kt-font-success"><?php echo $shop_product->shop; ?></label>   
                                                        <input type="hidden" name="id" value="<?php echo $shop_product->id; ?>" />                                                        
                                                    </div>   
                                                </div>
                                                <div class="row">                                                    
                                                    <div class="col-lg-12">
                                                        <label>Product:</label>
                                                        <label class="kt-font-bold kt-font-success"><?php echo $shop_product->product; ?></label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="">Price:</label>
                                                        <label class="kt-font-bold kt-font-success"><?php echo $shop_product->current_price; ?></label>
                                                    </div>
                                                </div>     
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="">Discount Price:</label>
                                                        <label class="kt-font-bold kt-font-success"><?php echo $shop_product->discount_price; ?></label>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="">Discount Price Start:</label>
                                                        <label class="kt-font-bold kt-font-success"><?php echo date('d/m/Y',strtotime($shop_product->discount_price_start)); ?></label>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="">Discount Price End:</label>
                                                        <label class="kt-font-bold kt-font-success"><?php echo date('d/m/Y',strtotime($shop_product->discount_price_end)); ?></label>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="">Brief Description:</label>
                                                        <label class="kt-font-bold kt-font-success"><?php echo $shop_product->description; ?></label>
                                                    </div>
                                                </div> 

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
            <?php } else { ?>
                <h5 class="text-danger">Nothing to delete.</h5>
            <?php } ?>
        </div>
    </div>
</div>

<!-- end:: Content -->