<?php
if (count(clQuery) == 2):
include(clPath . '/app/addons/rocket/pages/subpages/' . clQuery[1] . '.php');
else:
app::position('header');
app::asset('/app/addons/rocket/pages/demo.css');
include(clPath . '/app/addons/rocket/pages/menu.php');
?>
<section class="rocket-demo">
    <div class="r_c">
        <div class="header">
            Rocket index
        </div>
        <div class="breadcrumbs">
            <ul>
                <li class="home"><a href="#">Table of Contents</a></li>
            </ul>
        </div>
    </div>
</section>
<?php endif; ?>
