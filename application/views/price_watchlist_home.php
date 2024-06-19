<?php if ($search_category) : ?>
    <script type="text/javascript">
        window.g_search_category = "<?php echo $search_category; ?>";
    </script>
<?php endif;?> 
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Browse through the prices of ICCC monitored goods in Papua New Guinea.
                </h3>
            </div>            								

        </div>
        <div class="kt-portlet__body">

            <!--begin: Search Form -->
            <form class="kt-form kt-form--fit kt-margin-b-20">
                <div class="row kt-margin-b-20">
                    <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                        <label>Good:</label>
                        <input type="text" class="form-control kt-input" placeholder="E.g: Trukai Rice" data-col-index="1">
                    </div>

                    <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                        <label>Category:</label>
                        <select class="form-control kt-input" data-col-index="4">
                            <option value="">Select ...</option>
                        </select>
                    </div>

                    <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                        <label>Shop:</label>
                        <select class="form-control kt-input" data-col-index="5">
                            <option value="">Select ...</option>
                        </select>
                    </div>

                </div>
                <div class="row kt-margin-b-20">
                    <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                        <label>City/Town:</label>
                        <select class="form-control kt-input" data-col-index="7">
                            <option value="">Select ...</option>
                        </select>
                    </div>
                    <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                        <label>Region:</label>
                        <select class="form-control kt-input" data-col-index="8">
                            <option value="">Select ...</option>
                        </select>
                    </div>
                    <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                        <!-- <label>Price Date:</label>
                        <div class="input-daterange input-group" id="m_datepicker">
                            <input type="text" class="form-control kt-input" name="start" placeholder="From" data-col-index="11" />
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                            </div>
                            <input type="text" class="form-control kt-input" name="end" placeholder="To" data-col-index="11" />
                        </div> -->
                    </div>

                </div>
                <div class="kt-separator kt-separator--md kt-separator--dashed"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-brand kt-btn kt-btn--icon" id="m_search">
                            <span>
                                <i class="la la-search"></i>
                                <span>Search</span>
                            </span>
                        </button>
                        &nbsp;&nbsp;
                        <button class="btn btn-secondary kt-btn kt-btn--icon" id="m_reset">
                            <span>
                                <i class="la la-close"></i>
                                <span>Reset</span>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
            <!--end: Search Form -->

            <!--begin: Datatable -->
            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
            <table class="table table-striped- table-bordered table-hover table-checkable" id="dt_price_watchlist">
                <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>Product</th>
                        <th>Product ID</th>
                        <th>Image</th>
                        <th>Category</th>                       
                        <th>Shop</th>
                        <th>Shop ID</th>
                        <th>City</th>                      
                        <th>Region</th>                      
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Discount Price Start</th>  
                        <th>Discount Price End</th> 
                        <th>Actions</th>               
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Record ID</th>
                        <th>Product</th>
                        <th>Product ID</th>
                        <th>Image</th>
                        <th>Category</th>                       
                        <th>Shop</th>
                        <th>Shop ID</th>
                        <th>City</th>                      
                        <th>Region</th>                      
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Discount Price Start</th>  
                        <th>Discount Price End</th> 
                        <th>Actions</th>  
                    </tr>
                </tfoot>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
    <div class="alert alert-light alert-elevate" role="alert">
        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
        <div class="alert-text">
            Disclaimer: The prices of the goods and services displayed on this page is taken from the individual shops and is not set by 
            the Papua New Guinea Independent Consumer & Competition Commission (ICCC). Please read our <a href="#" class="kt-link" target="_blank"> disclaimer </a>.
        </div>
    </div>
</div>