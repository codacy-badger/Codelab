<?php
app::position('header');
app::asset('/app/addons/rocket/pages/demo.css');
include(clPath . '/app/addons/rocket/pages/menu.php');
?>
<section class="rocket-demo">
    <div class="r_c">
        <div class="header">
            Ordered list
        </div>
        <div class="breadcrumbs">
            <ul>
                <li><a href="#">Typography</a></li>
                <li><a href="#">List</a></li>
                <li><a href="#">Ordered</a></li>
            </ul>
        </div>
        <div class="topic">
            Default
        </div>
        <div class="example">
<pre><?php echo htmlentities('
<ol class="list">
    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
    <li>Sed do eiusmod tempor incididunt ut labore</li>
    <li>Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</li>
    <li>Exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
    <li>Ssed do eiusmod tempor incididunt ut labore</li>
</ol>
');  ?></pre>
        </div>

        <div class="content">
            <ol class="list">
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
                <li>Sed do eiusmod tempor incididunt ut labore</li>
                <li>Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</li>
                <li>Exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
                <li>Ssed do eiusmod tempor incididunt ut labore</li>
            </ol>
        </div>
        <div class="topic">
            Multi-level
        </div>
        <div class="example">
<pre><?php echo htmlentities('
<ol class="list">
    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
    <li>
        Sed do eiusmod tempor incididunt ut labore
        <ol>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
            <li>Sed do eiusmod tempor incididunt ut labore</li>
            <li>Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</li>
            <li>Exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
            <li>Ssed do eiusmod tempor incididunt ut labore</li>
        </ol>
    </li>
    <li>Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</li>
    <li>Ssed do eiusmod tempor incididunt ut labore</li>
</ol>
');  ?></pre>
        </div>

        <div class="content">
            <ol class="list">
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
                <li>
                    Sed do eiusmod tempor incididunt ut labore
                    <ol>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
                        <li>Sed do eiusmod tempor incididunt ut labore</li>
                        <li>Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</li>
                        <li>Exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
                        <li>Ssed do eiusmod tempor incididunt ut labore</li>
                    </ol>
                </li>
                <li>Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</li>
                <li>Ssed do eiusmod tempor incididunt ut labore</li>
            </ol>
        </div>
    </div>
</section>
