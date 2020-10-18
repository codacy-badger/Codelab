<?php
GLOBAL $clSectionId;
GLOBAL $clSectionSettings;
// Asset rocket plugin
clApp::asset(
    array(
        '/app/sections/features/features.css',
        '/app/sections/features/features.js',


    )
);
?>

<section id="clSection_<?php echo $clSectionId; ?>" class="clSection features" >
    <div class="container">
    <ul>
        <li>Advanced network screening powered by Safety Performance Functions</li>
        <li>Deployment of advanced ranking techniques</li>
        <li>Support for existing SPF databases</li>
        <li>Support for jurisdiction-specific SPFs</li>
        <li>Permit flexible jurisdiction-specific SPF format entry</li>
        <li>Automatic evaluation of crash data fit to selected SPFs</li>
        <li>Customization of data format</li>
        <li>Built-in data visualization tool permits customization of data and the network screening results in the form of interactive 2D, 3D graphs, and maps</li>
    </ul>
    <ul>
        <li>Automatic data verification process</li>
        <li>Diagnostic process</li>
        <li>Search for abnormal crash patterns</li>
        <li>Evaluation of existing crash modification factors to fit local conditions</li>
        <li>Creation of your jurisdiction-specific crash modification factors (EB before and after analysis)</li>
        <li>Full economic analysis at project or individual site level</li>
        <li>Customization of reports</li>
        <li>Optimization of calculation time</li>
    </ul>
</div>
</div>
</section>
