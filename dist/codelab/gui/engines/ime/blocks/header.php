<header>
    <a href="<?php echo clUrl; ?>/cl">
        <div class="logo">
            <div class="logo-img">
                <img alt="logo" src="<?php echo engine::url(); ?>/assets/images/logo.svg">
            </div>
        </div>
    </a>
    <nav class="mainMenu">
        <ul>
            <li <?php if (count(clQuery) == 1): ?>class="active"<?php endif; ?>>
                <a href="<?php echo clUrl; ?>/cl" class="layer">
                    <i class="fas fa-tachometer-alt"></i>
                </a>
                <div id="dashboard" class="tooltip subpanelLoad">
                    Dashboard
                </div>
            </li>
            <li <?php if (count(clQuery) == 2 AND clQuery[1] == 'team'): ?>class="active"<?php endif; ?>>
                <a href="<?php echo clUrl; ?>/cl/team/list" class="layer">
                    <i class="fas fa-users"></i>
                </a>
                <div id="team" class="tooltip subpanelLoad">
                    Team
                </div>
            </li>
            <li <?php if (count(clQuery) == 2 AND clQuery[1] == 'users'): ?>class="active"<?php endif; ?>>
                <a href="<?php echo clUrl; ?>/cl/users" class="layer">
                    <i class="fas fa-user"></i>
                </a>
                <div id="users" class="tooltip subpanelLoad">
                    Users
                </div>
            </li>
            <li <?php if (count(clQuery) == 2 AND clQuery[1] == 'pages'): ?>class="active"<?php endif; ?>>
                <a href="<?php echo clUrl; ?>/cl/pages" class="layer">
                    <i class="fas fa-newspaper"></i>
                </a>
                <div id="pages" class="tooltip subpanelLoad">
                    Pages
                </div>
            </li>
            <li <?php if (count(clQuery) == 2 AND clQuery[1] == 'data'): ?>class="active"<?php endif; ?>>
                <a href="<?php echo clUrl; ?>/cl/data" class="layer">
                    <i class="fas fa-folder"></i>
                </a>
                <div id="data" class="tooltip subpanelLoad">
                    Data
                </div>
            </li>

            <li <?php if (count(clQuery) == 2 AND clQuery[1] == 'packages'): ?>class="active"<?php endif; ?>>
                <a href="<?php echo clUrl; ?>/cl/packages" class="layer">
                    <i class="fas fa-puzzle-piece"></i>
                </a>
                <div id="packages" class="tooltip subpanelLoad">
                    Packages
                </div>
            </li>
            <li <?php if (count(clQuery) == 2 AND clQuery[1] == 'media'): ?>class="active"<?php endif; ?>><li>
                <a href="<?php echo clUrl; ?>/cl/media" class="layer">
                    <i class="fas fa-file-image"></i>
                </a>
                <div id="media" class="tooltip subpanelLoad">
                    Media
                </div>
            </li>
            <li <?php if (count(clQuery) == 2 AND clQuery[1] == 'languages'): ?>class="active"<?php endif; ?>>
                <a href="<?php echo clUrl; ?>/cl/languages" class="layer">
                    <i class="fas fa-globe-europe"></i>
                </a>
                <div id="languages" class="tooltip subpanelLoad">
                    Languages
                </div>
            </li>
            <li <?php if (count(clQuery) == 2 AND clQuery[1] == 'system'): ?>class="active"<?php endif; ?>>
                <a href="<?php echo clUrl; ?>/cl/system" class="layer">
                    <i class="fas fa-cog"></i>
                </a>
                <div id="system" class="tooltip subpanelLoad">
                    System
                </div>
            </li>
            <li <?php if (count(clQuery) == 2 AND clQuery[1] == 'codex'): ?>class="active"<?php endif; ?>>
                <a href="<?php echo clUrl; ?>/cl/codex" class="layer">
                    <i class="fas fa-code-branch"></i>
                </a>
                <div id="system" class="tooltip">
                    Codex
                </div>
            </li>
            <!--
            <li>
                <a href="<?php echo clUrl; ?>/cl/theme">
                    <i class="fas fa-mountain"></i>
                </a>
                <div id="system" class="tooltip">
                    Theme
                </div>
            </li>
            -->
        </ul>
    </nav>
    <div id="subpanel" class="subpanel">
        <div class="inner">
            <input id="subpanelGet" value="0" type="hidden" />
            <div id="subpanelClose" class="close">
                <i class="fas fa-times"></i>
            </div>
            <div id="subpanelLoader" class="subpanelLoader">
                <div class="lds-ripple"><div></div><div></div></div>
            </div>
            <div id="subpanelContent" class="subpanelContent">
                This is content
            </div>
        </div>
    </div>
</header>
