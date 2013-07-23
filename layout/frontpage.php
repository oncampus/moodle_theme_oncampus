<?php

$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$showsidepre = $hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT);
$showsidepost = $hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT);

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    if (!right_to_left()) {
        $bodyclasses[] = 'side-pre-only';
    }else{
        $bodyclasses[] = 'side-post-only';
    }
} else if ($showsidepost && !$showsidepre) {
    if (!right_to_left()) {
        $bodyclasses[] = 'side-post-only';
    }else{
        $bodyclasses[] = 'side-pre-only';
    }
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
	<!--[if IE 9]><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" ><![endif]-->
	<!--[if IE 8]><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" ><![endif]-->
	<!--[if IE 7]><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" ><![endif]-->
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <meta name="description" content="<?php p(strip_tags(format_text($SITE->summary, FORMAT_HTML))) ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
	
</head>
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">
  <div id="headerwrapper">
    <div id="page-header">
	  <div id="header"><div id="header-visuell">
				
        <div class="headermenu"><?php
            echo $OUTPUT->login_info();
            echo $OUTPUT->lang_menu();
            echo $PAGE->headingmenu;
        ?></div>
        <?php if ($hascustommenu) { ?>
        <div id="custommenu"><?php echo $custommenu; ?></div>
         <?php } ?>
		 
		<div class="navbar clearfix">
            <div id="homeimage"><a href="<?php echo $CFG->wwwroot; ?>" title="Startseite">&nbsp;</a></div>
			<div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
			<?php if ($hasnavbar) { ?>
				<div class="navbutton"> <?php echo $PAGE->button; ?></div>
			<?php } ?>
        </div>
      </div></div>
    </div>
  </div>
<!-- END OF HEADER -->
<div id="pagewrapper">
  <div id="page-content-wrapper">
    <div id="page-content">
	  <div id="page-visuell">
        <div id="region-main-box">
             <div id="region-main-wrap" class="colpos">
                    <div id="region-main">
                        <div class="region-content">
                            <?php echo $OUTPUT->main_content() ?>
                        </div>
                    </div>
                </div>
				<div id="sidebars">
					<?php if ($hassidepre OR (right_to_left() AND $hassidepost)) { ?>
					<div id="region-pre" class="block-region colpos">
						<div class="region-content">
							<?php 
								if (!right_to_left()) {
									echo $OUTPUT->blocks_for_region('side-pre');
								} elseif ($hassidepost) {
									echo $OUTPUT->blocks_for_region('side-post');
								} ?>
						</div>
					</div>
					<?php } ?>

					<?php if ($hassidepost OR (right_to_left() AND $hassidepre)) { ?>
					<div id="region-post" class="block-region colpos">
						<div class="region-content">
							<?php 
								if (!right_to_left()) {
									echo $OUTPUT->blocks_for_region('side-post');
								} elseif ($hassidepre) {
									echo $OUTPUT->blocks_for_region('side-pre');
								} ?>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="clearer"></div>
            </div>
        </div>
    </div>
  </div>
</div>
<!-- START OF FOOTER -->
    <div id="page-footer">
	  <div id="footer">
		<div id="footerlinks"><a href="http://www.oncampus.de" target="_blank">Homepage</a> &nbsp;|&nbsp; <a href="http://www.onlinebynature.de" target="_blank">Blog</a> &nbsp;|&nbsp; <a href="http://docs.moodle.org/en/License" target="_blank">License</a> &nbsp;|&nbsp; <a href="http://oncampuspedia.oncampus.de/" target="_blank">Wiki: oncampuspedia</a> &nbsp;|&nbsp; <a href="mailto:support@oncampus.de">Support</a><br/><br/></div>
        <p class="helplink">
        <?php echo page_doc_link(get_string('moodledocslink')) ?>
        </p>

        <?php
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </div>
  </div>
</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>