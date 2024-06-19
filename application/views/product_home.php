<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Maintain Goods Information
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-toolbar-wrapper">                   
                    <a href="<?php echo base_url() ?>Product/add_new" class="btn btn-primary btn-sm"><i class="la la-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            
            <!--begin: Datatable -->            
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_product_datatables">
                <thead>
                    <tr>     
                        <th>Good Id</th>
                        <th>Image</th>                          
                        <th>Good</th>                      
                        <th>Category</th>   
                        <th>Size</th>                        
                        <th>Description</th>                                   
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>                      
                        <th>Good Id</th>
                        <th>Image</th>                          
                        <th>Good</th>                      
                        <th>Category</th>     
                        <th>Size</th>                     
                        <th>Description</th>                                   
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>

            <!--end: Datatable -->
        </div>
    </div>  
</div>