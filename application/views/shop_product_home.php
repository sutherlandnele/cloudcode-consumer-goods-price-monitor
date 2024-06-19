<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Maintain Goods Sold By Shop
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-toolbar-wrapper">                   
                    <a href="<?php echo base_url() ?>ShopProduct/add_new" class="btn btn-primary btn-sm"><i class="la la-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            
            <!--begin: Datatable -->            
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_shop_product_datatables">
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
                        <th>Image</th>                       
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
            <!--end: Datatable -->
        </div>
    </div>  
</div>