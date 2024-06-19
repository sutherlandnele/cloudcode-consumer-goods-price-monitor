        </div>
                    <?php include('partials/_footer-base.php'); ?>
                </div>
            </div>
        </div>
        <!-- end:: Page -->
        <!-- begin:: Topbar Offcanvas Panels -->
        <?php //include('partials/_offcanvas-quick-actions.php'); ?>
        <!-- end:: Topbar Offcanvas Panels -->
        <?php //include('partials/_layout-quick-panel.php'); ?>
        <?php //include('partials/_layout-scrolltop.php'); ?>
        <?php //include('partials/_layout-toolbar.php'); ?>
        <?php //include('partials/_layout-demo-panel.php'); ?>

        <!-- begin::Global Config(global config for global JS scripts) -->
        <script>            
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5578eb",
                    "metal": "#c4c5d6",
                    "light": "#ffffff",
                    "accent": "#00c5dc",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995",
                    "focus": "#9816f4"        
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"]
                }    
            }
        };        
        </script>
        <!-- end::Global Config -->

        <!--begin::Global Theme Bundle(used by all pages) -->      		 
        <script src="<?php echo base_url() ?>assets/vendors/global/vendors.bundle.js" type="text/javascript"></script>
       
        <script src="<?php echo base_url() ?>assets/js/demo2/scripts.bundle.js" type="text/javascript"></script>

        <!--begin::Page Alert-->
        <script type="text/javascript">
            <?php if($this->session->flashdata('success')){ ?>

                PageAlert.success("Success","<?php echo $this->session->flashdata('success'); ?>");
                
                <?php  unset($_SESSION['success']); ?>
                
            <?php }else if($this->session->flashdata('error')){  ?>

                PageAlert.error("An error occured","<?php echo $this->session->flashdata('error'); ?>");
                
                 <?php  unset($_SESSION['error']); ?>

            <?php }else if($this->session->flashdata('warning')){  ?>

                PageAlert.warning("Warning","<?php echo $this->session->flashdata('warning'); ?>");
                
                 <?php  unset($_SESSION['warning']); ?>

            <?php }else if($this->session->flashdata('info')){  ?>

                PageAlert.info("Information","<?php echo $this->session->flashdata('info'); ?>");
                
                <?php  unset($_SESSION['info']); ?>

            <?php } ?>
        </script>
        <!--end::Page Alert-->
        <!--end::Global Theme Bundle -->

        <!--begin::Page Vendors(used by this page). *** TO-DO: Optimization required. Need to check route and load -->
        <script src="<?php echo base_url() ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>	      
        <!--end::Page Vendors -->

        <!--begin::Page Scripts(used by this page). -->
        <?php if (isset($page_use_datatables_js) && $page_use_datatables_js=='1') : ?>
                <!--datatables.bundle.js has to be referenced before scripts.bundle.js!! There is some kind of issue with quick search. Ticket raised with Keen -->
                <script src="<?php echo base_url() ?>assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>  
        <?php endif;?>  

        <?php if (isset($page_js) && $page_js != '') : ?>
            <script src="<?php echo base_url() ?>assets/js/demo2/pages/<?php echo $page_js;?>" type="text/javascript"></script>
            <?php if ($page_js == 'product_view.js' || $page_js == 'product_location_home.js' || $page_js == 'shop_view.js' || $page_js == 'shop_product_view.js') : ?>
                <!-- Google Maps dependant pages. Put this script at the very end to avoid uncaught js errors -->
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOnaA9P8e2ackJtW0K784eq_XsJlWPMZs&callback=GMap.initLocation"></script>  
            <?php endif;?> 
        <?php endif;?> 
        
            
        <!--end::Page Scripts -->        

    </body>
    <!-- end::Body -->
</html>