<?php echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
	<!--[if IE 9]><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" ><![endif]-->
	<!--[if IE 8]><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" ><![endif]-->
	<!--[if IE 7]><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" ><![endif]-->

	<link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
	
</head>
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">

<div id="headerwrapper">
  <div id="page-header">
	<div id="header">
	  <div id="header-visuell">
	  </div>
	</div>
  </div>
</div>
<!-- END OF HEADER -->
<div id="pagewrapper"><div id="page-content-wrapper">
<div id="page-content"><div id="page-visuell">
	<div id="region-main-box">
		<div id="region-main-wrap" class="colpos">
  			<div id="region-main" >
			  <div class="region-content">
				<?php echo $OUTPUT->main_content() ?>
			  </div>
			</div>
		</div>
    </div></div>
</div></div>
</div>
<!-- START OF FOOTER -->
<div id="page-footer">
	<div id="footer">	
	</div>
</div>

</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>