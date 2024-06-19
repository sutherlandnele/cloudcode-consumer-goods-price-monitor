<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
        <div class="col-lg-12">
            <?php if (count($shop) > 0) { ?>
                <!--begin::Portlet-->
                <div class="kt-portlet" id="kt_page_portlet">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Shop Delete Confirmation</h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="btn-group">
                                <a type="button" class="btn btn-brand" href="<?php echo base_url() ?>Shop">
                                    <i class="la la-arrow-left"></i>
                                    <span class="kt-hidden-mobile">Back</span>
                                </a>
                                <button type="button" class="btn btn-brand dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Confirm delete?
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" id="shop_delete_yes"><i class="la la-check"></i> Yes</a>    
                                    <div class="dropdown-divider"></div>                               
                                    <a class="dropdown-item" href="<?php echo base_url() ?>shop"><i class="la  la-hand-stop-o"></i> No</a>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <form class="kt-form kt-form--label-right" id="delete_shop_confirmation_form" action="<?php echo base_url('Shop/delete');?>" method="post">                             
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">   
                                    <h3 class="kt-section__title kt-section__title-lg"><?php echo $shop->name; ?></h3> 
                                    <input type="hidden" name="id" id="shop_id" value="<?php echo $shop->id; ?>" />                              
                                    <div class="row form-group">
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="kt-section kt-section--first">
                                                <div class="kt-section__body">                                               
                                                
                                                    <div class="row">                                                    
                                                        <div class="col-lg-12">
                                                            <label>City:</label>
                                                            <label class="kt-font-bold kt-font-success"><?php echo $shop->city; ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label class="">Region:</label>
                                                            <label class="kt-font-bold kt-font-success"><?php echo $shop->region; ?></label>
                                                        </div>
                                                    </div>     
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label class="">Location Lattitude:</label>
                                                            <label class="kt-font-bold kt-font-success"><?php echo $shop->latitude; ?></label>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label class="">Location Longtitude:</label>
                                                            <label class="kt-font-bold kt-font-success"><?php echo $shop->longtitude; ?></label>
                                                        </div>
                                                    </div>  
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label class="">Website:</label>
                                                            <label class="kt-font-bold kt-font-success"><?php echo anchor(prep_url($shop->website),$shop->website,'target="_blank" class="kt-link"'); ?></label>
                                                        </div>
                                                    </div>                                           
                                                    <div class="row">
                                                        <div class="col-lg-12">                                            
                                                            <label>Brief Description:</label><br/>
                                                            <label class="kt-font-bold kt-font-success"><?php echo $shop->description; ?></label>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <!-- <div class="kt-space-10"></div> -->
                                            <div class="kt-section kt-section">
                                                <div class="kt-section__body">                                               
                                                    <h3 class="kt-section__title kt-section__title-sm">Goods sold by shop</h3>
                                                    <!--begin: Datatable -->            
                                                    <table class="table table-striped- table-bordered table-hover table-checkable" id="shop_view_datatables">
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
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>  
                            <div class="kt-section">
                                <div class="kt-section__body">
                                    <h3 class="kt-section__title kt-section__title-sm">Shop location</h3>                                    
                                    <div id="shop_location_map" style="height: 700px;width: 100%;background-color: grey;"></div>          
                                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOnaA9P8e2ackJtW0K784eq_XsJlWPMZs&callback=ProductView.initShopLocationMap"></script>  
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