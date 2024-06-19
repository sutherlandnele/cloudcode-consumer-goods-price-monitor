<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
        <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Locate shops selling good
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-toolbar-wrapper">                   
                    </div>
                </div>
            </div>        
            <div class="kt-portlet__body">
                <form class="kt-form kt-form--label-right" method="post" id="product_location_form"> 
                    <div class="kt-section kt-section--first">   
                        <div class="kt-section__body">
                            <!-- <h3 class="kt-section__title kt-section__title-sm">Shop locations selling good</h3> -->   
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2 col-md-2 col-sm-12">Search Good</label>
                                <div class="col-lg-4 col-md-5 col-sm-12">
                                    <?php echo form_dropdown('product_live_search', $dd_products,isset($product) && count($product) > 0 ? $product->id: '','class="form-control kt_selectpicker" data-live-search="true" id="product_live_search"'); ?>
                                    <span class="form-text text-muted">Type in the name of the good for which you want to locate</span> 
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

    <?php if (isset($product) && count($product) > 0) { ?>
    <div class="row">
        <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label"><h3 class="kt-portlet__head-title">Details of Good</h3></div>
                </div>
                <div class="kt-portlet__body">
                    <form class="kt-form" id="kt-form"> 
                        <div class="kt-section">
                            <div class="kt-section__body">     
                            <h3 class="kt-section__title kt-section__title-md"><?php echo $product->size.' '.$product->name; ?></h3>   
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-sm"></div>  
                                <div class="form-group row">
                                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12">
                                            <input type="hidden" id="product_id" value="<?php echo $product->id; ?>" />  
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
                                    <div class="col-lg-8 col-lg-8 col-md-8 col-sm-12">
                                        <div class="kt-section kt-section">
                                            <div class="kt-section__body">                                               
                                                <h3 class="kt-section__title kt-section__title-sm">Shops selling <?php echo $product->size.' '.$product->name; ?></h3>
                                                <!--begin: Datatable -->            
                                                <table class="table table-striped- table-bordered table-hover table-checkable" id="product_location_datatables">
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
                    </form>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    <?php } ?>

    <div class="row">
        <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Location of shops selling <?php echo isset($product) && count($product)? $product->size.' '.$product->name : 'Good'; ?></h3>
                    </div>
                </div>
                <div class="kt-portlet__body kt-portlet__body--fluid">
                    <div id="shop_locations_map" style="height: 700px;width: 100%;background-color: grey;"></div>          
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
</div>