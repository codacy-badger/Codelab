<?php

if (auth::check()):
    $theme = clPath . '/codelab/gui/engines/' . clRegistry['gui.engine'] . '/system.php';
    include($theme);
else:
    $theme = clPath . '/codelab/gui/engines/' . clRegistry['gui.engine'] . '/auth.php';
    include($theme);
endif;
