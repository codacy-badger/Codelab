<?php
GLOBAL $clSectionId;
GLOBAL $clSectionSettings;


// Asset rocket plugin
clApp::asset(
    array(
        '/app/sections/footer/footer.css',
        '/app/sections/footer/footer.js',
    )
);


?>


<footer id="clSection_<?php echo $clSectionId; ?>" class="clSection footer">
    <?php if (clPage['alias'] != 'contact'):  ?>
	<div class="container">

        <div class="main">
            <div class="line"><div class="inner"></div></div>
            <h1>Interested in SPF Tool ?</h1>
            <h4>Please contact us to learn how SPF Tool can help your organization achive 'Vision Zero'</h4>
            <div class="button">
                <a href="/contact" class="btn">
                    Contact us
                </a>
            </div>
        </div>

	</div>
    <?php endif; ?>
</footer>

<section id="clSection_<?php echo $clSectionId; ?>" class="clSection footerCopy">
    <div class="container">
        <div class="left">
            SPF Tool copyright <?php echo date('Y'); ?>
        </div>
        <div class="right">
            <a href="/terms-and-conditions">Terms and Conditions</a>
        </div>
    </div>
</div>

</section?>
