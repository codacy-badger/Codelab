<?php
    engine::asset(
        array(
            // Plugins
            // -- clTable
            '/assets/plugins/clTable/clTable.css',
            '/assets/plugins/clTable/themes/default.css',
            '/assets/plugins/clTable/clTable.js',
            // -- Chart.js
            '/assets/plugins/Chart.js/Chart.min.js',
            // Page additions
            '/pages/team/script.js',
            // Widgets
            '/assets/styles/widgets/list.css'
        )
    );

?>
<!-- char-visitors-log-dashboard -->

        <div class="widget list">
            <h1>Tables</h1>
            <ul>
                <li>
                    <a href="<?php echo clUrl; ?>/cl/codex/tables/static-full-configuration">
                        Static full configuration
                    </a>
                </li>
                <li>
                    <a href="<?php echo clUrl; ?>/cl/codex/tables/ajax-full-configuration">
                        Ajax full configuration
                    </a>
                </li>
            </ul>
        </div>
