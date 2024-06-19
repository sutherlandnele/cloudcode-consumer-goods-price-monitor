<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
        <div class="col-lg-12">
            <?php if (count($product) > 0) { ?>
                <!--begin::Portlet-->
                <div class="kt-portlet" id="kt_page_portlet">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Good Delete Confirmation</h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="btn-group">
                                <a type="button" class="btn btn-brand" href="<?php echo base_url() ?>product">
                                    <i class="la la-arrow-left"></i>
                                    <span class="kt-hidden-mobile">Back</span>
                                </a>
                                <button type="button" class="btn btn-brand dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Confirm delete?
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" id="product_delete_yes"><i class="la la-check"></i> Yes</a>    
                                    <div class="dropdown-divider"></div>                               
                                    <a class="dropdown-item" href="<?php echo base_url() ?>product"><i class="la  la-hand-stop-o"></i> No</a>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <form class="kt-form kt-form--label-right" id="delete_product_confirmation_form" action="<?php echo base_url('Product/delete');?>" method="post">        
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">            
                                    <h3 class="kt-section__title kt-section__title-lg"><?php echo $product->size; ?> <?php echo $product->name; ?></h3>   
                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-sm"></div>                                                    
                                    <div class="row form-group">
                                        <div class="col-lg-3 col-md-4 col-sm-12">                                            
                                            <input type="hidden" name="id" id="product_id" value="<?php echo $product->id; ?>" />  
                                            <?php if ($product->image) { ?>
                                                <!-- <label class="col-form-label">Image</label> -->
                                                <!-- <div class="kt-avatar kt-avatar--circle" id="kt_profile_avatar_2">
                                                    <div class="kt-avatar__holder" style="background-image: url()"></div>
                                                </div> -->
                                                
                                                 <!-- Trigger the Modal -->
                                                <img id="myModalImg" class="img-thumbnail kt-margin-b-10" src="<?php echo base_url().'uploads/products/'.$product->image; ?>" alt="<?php echo $product->description; ?>" style="width:100%;max-width:300px">
                                                <!-- The Modal -->
                                                    <div id="myModalDialog" class="myModalDialog">

                                                    <!-- The Close Button -->
                                                    <span class="myModalDialogClose">&times;</span>

                                                    <!-- Modal Content (The Image) -->
                                                    <img class="myModalDialog-content" id="myModalImg01">

                                                    <!-- Modal Caption (Image Text) -->
                                                    <div id="myModalImgCaption"></div>
                                                </div> 


                                            <?php } else { ?>
                                                <h5 class="text-danger">No image.</h5>
                                            <?php } ?>

                                            <div class="kt-section">
                                                <div class="kt-section__body">                                                                                               
                                                    <div class="row">                                                    
                                                        <div class="col-lg-12">
                                                            <label>Category:</label>
                                                            <label class="kt-font-bold kt-font-success"><?php echo $product->category; ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">                                            
                                                            <label>Brief Description:</label><br/>
                                                            <label class="kt-font-bold kt-font-success"><?php echo $product->description; ?></label>    
                                                        </div>
                                                    </div>
                                                    <div class="kt-space-10"></div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <div class="kt-section kt-section">
                                                <div class="kt-section__body">                                               
                                                    <h3 class="kt-section__title kt-section__title-sm">Shops selling <?php echo $product->size; ?> <?php echo $product->name; ?></h3>
                                                    <!--begin: Datatable -->            
                                                    <table class="table table-striped- table-bordered table-hover table-checkable" id="product_view_datatables">
                                                        <thead>
                                                            <tr>     
                                                                <th>Id</th>
                                                                <th>Shop</th>      
                                                                <th>Shop Id</th>                          
                                                                <th>Good</th>    
                                                                <th>Good Id</th>                      
                                                                <th>Price</th>
                                                                <th>Discount Price</th>
                                                                <th>Discount Price Start</th>       
                                                                <th>Discount Price End</th>                                               
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <!--end: Datatable -->
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>   
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-sm"></div>  
                            <div class="kt-section">
                                <div class="kt-section__body">
                                    <h3 class="kt-section__title kt-section__title-sm">Location of shops selling <?php echo $product->size; ?> <?php echo $product->name; ?></h3>                                    
                                    <div id="product_shop_locations_map" style="height: 700px;width: 100%;background-color: grey;"></div>          
                                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOnaA9P8e2ackJtW0K784eq_XsJlWPMZs&callback=ProductView.initProductShopLocationsMap"></script>  
                                    <!-- <div class="kt-space-10"></div> -->
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