<!DOCTYPE html>
<html lang="en" >
    
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8"/>
        <title>ICCC | CTR</title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!--begin::Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>        
        <script>            
            WebFont.load({
                google: {
                            "families":[
                            "Poppins:300,400,500,600,700"]
                        },
                        active: function() {
                            sessionStorage.fonts = true;                
                        }            
            });        
        </script>
        <!--end::Fonts -->

        <!--begin::Page Vendors Styles(used by this page) -->
        <link href="<?php echo base_url() ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors Styles -->

        <!--begin::Global Theme Styles(used by all pages) -->
        <link href="<?php echo base_url() ?>assets/vendors/global/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/demo2/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
        <link href="<?php echo base_url() ?>assets/css/demo2/skins/aside/navy.css" rel="stylesheet" type="text/css" />
        <!--end::Layout Skins -->

        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/media/logos/favicon.ico" />

        <!--begin::Store base_url & apppath for js access -->
        <script type="text/javascript">
            window.g_base_url = "<?php echo base_url(); ?>";          
        </script>
        <!--end::Store base_url for js access -->

    </head>
    <!-- end::Head -->

    <!-- begin::Body -->
    <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--static kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading" >
	<?php include('partials/_header-base-mobile.php'); ?>
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
			<?php include('partials/_aside-base.php'); ?>
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper">
				<?php include('partials/_header-base.php'); ?>
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
                    <?php include('partials/_header-title.php'); ?>		
                    <div class="toast toast-custom toast-fill fade" role="alert" aria-live="assertive" aria-atomic="true" id="cc_success_page_alert">
                        <div class="toast-header">
                            <i class="toast-icon flaticon2-attention kt-font-success"></i>
                            <span class="toast-title"></span>                                                
                            <button type="button" class="toast-close" data-dismiss="toast" aria-label="Close">
                                <i class="la la-close"></i>
                            </button>
                        </div>
                        <div class="toast-body">                                                
                        </div>
                    </div>
                    <div class="toast toast-custom toast-fill fade" role="alert" aria-live="assertive" aria-atomic="true" id="cc_error_page_alert">
                        <div class="toast-header">
                            <i class="toast-icon flaticon2-attention kt-font-danger"></i>
                            <span class="toast-title"></span>                                                
                            <button type="button" class="toast-close" data-dismiss="toast" aria-label="Close">
                                <i class="la la-close"></i>
                            </button>
                        </div>
                        <div class="toast-body">                                                
                        </div>
                    </div>
                    <div class="toast toast-custom toast-fill fade" role="alert" aria-live="assertive" aria-atomic="true" id="cc_warning_page_alert">
                        <div class="toast-header">
                            <i class="toast-icon flaticon2-attention kt-font-warning"></i>
                            <span class="toast-title"></span>                                                
                            <button type="button" class="toast-close" data-dismiss="toast" aria-label="Close">
                                <i class="la la-close"></i>
                            </button>
                        </div>
                        <div class="toast-body">                                                
                        </div>
                    </div>
                    <div class="toast toast-custom toast-fill fade" role="alert" aria-live="assertive" aria-atomic="true" id="cc_info_page_alert">
                        <div class="toast-header">
                            <i class="toast-icon flaticon2-attention kt-font-info"></i>
                            <span class="toast-title"></span>                                                
                            <button type="button" class="toast-close" data-dismiss="toast" aria-label="Close">
                                <i class="la la-close"></i>
                            </button>
                        </div>
                        <div class="toast-body">                                                
                        </div>
                    </div>		 