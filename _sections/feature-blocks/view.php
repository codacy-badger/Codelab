<?php
GLOBAL $clSectionId;
GLOBAL $clSectionSettings;

// Asset rocket plugin
clApp::asset(
    array(
        '/app/sections/feature-blocks/feature-blocks.css',
        '/app/sections/feature-blocks/feature-blocks.js',
    )
);


?>

<section id="clSection_<?php echo $clSectionId; ?>" class="clSection feature-blocks">

    					<div class="container">

    						<div class="items">
                                <?php
                                for ($i = 0; $i < 3; $i++) {
                                ?>
                                <div class="item">
                                    <div class="layer">

                                    </div>
    								<div class="inner">
    									<h3>
    										Pracownik produkcji/ pakowacz w Hilton Food Group
    									</h3>
    									<div class="attribute">
    										Published: <span>18.07.2020</span>
    									</div>
    									<div class="attribute">
    										Author: <span>John smith</span>
    									</div>

    									<div class="description">
    										<?php echo clLorem::words(2); ?>
    									</div>
    								</div>
    							</div>
                                <?php
                                }
                                ?>
    							<!-- ##### -->

    						</div>
    						<div class="buttons">
    							<a href="#" class="button">View more news</a>
    						</div>
    					</div>

    				</section>
