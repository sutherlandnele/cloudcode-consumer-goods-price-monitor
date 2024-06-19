<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
<?php if (count($product) > 0) { ?>
    <div class="row">
        <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
            <!--begin::Portlet-->
            <div class="kt-portlet" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">View Good Information</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="<?php echo $l3_breadcrumb_url ?>" class="btn btn-secondary kt-margin-r-10">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Back</span>
                        </a>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <form class="kt-form kt-form--label-right" id="view_product_form" >        
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">            
                                <h3 class="kt-section__title kt-section__title-lg"><?php echo $product->size; ?> <?php echo $product->name; ?></h3>   
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-sm"></div>                                                    
                                <div class="row form-group">
                                    <div class="col-lg-3 col-md-4 col-sm-12">                                            
                                        <input type="hidden" id="product_id" value="<?php echo $product->id; ?>" />  
                                        <?php if ($product->image) { ?>
                                                                                            
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
                                            <!-- Trigger the Modal -->
                                            <img id="myModalImg" class="img-thumbnail kt-margin-b-10" src="<?php echo base_url().'uploads/products/image_not_available.jpg' ?>" alt="" style="width:100%;max-width:300px">
                                            <!-- The Modal -->
                                            <div id="myModalDialog" class="myModalDialog">

                                            <!-- The Close Button -->
                                            <span class="myModalDialogClose">&times;</span>

                                            <!-- Modal Content (The Image) -->
                                            <img class="myModalDialog-content" id="myModalImg01">

                                            <!-- Modal Caption (Image Text) -->
                                            <div id="myModalImgCaption"></div>
                                            </div> 
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
                                                        <label>Size:</label>
                                                        <label class="kt-font-bold kt-font-success"><?php echo $product->size; ?></label>
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
                                        <div class="kt-section">
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
                    </form>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Location of shops selling <?php echo $product->size; ?> <?php echo $product->name; ?></h3>
                    </div>
                </div>
                <div class="kt-portlet__body kt-portlet__body--fluid">
                    <div id="product_shop_locations_map" style="height: 700px;width: 100%;background-color: grey;"></div>          
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>

<?php } else { ?>
    <h5 class="text-danger">Nothing to View.</h5>
<?php } ?>
</div>
<?php if ($shop_view_url) : ?>
    <script type="text/javascript">
        window.g_shop_view_url = "<?php echo $shop_view_url; ?>";
    </script>
<?php endif;?> 
<!-- end:: Content -->