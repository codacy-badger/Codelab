<?php
GLOBAL $clSectionId;
GLOBAL $clSectionSettings;

// Asset rocket plugin
clApp::asset(
    array(
        '/app/sections/services/services.css',
        '/app/sections/services/services.js',
    )
);


?>
<section id="clSection_<?php echo $clSectionId; ?>" class="clSection services">
    <div class="container">
        <p>Our team is committed to providing exceptional services in a wide range of transportation safety analyses. Our highly skilled and educated staff is ready to undertake any complex and difficult task. We stand behind our work and analysis.</p>
        <p>Dr. Kwasniak, a transportation engineer with more than 15 years of experience, along with his team, have created the SPF Tool to be the first of its type of cost-efficient and user-friendly tools on the market. Our team has experience in managing crash records and databases, and in developing jurisdiction-specific SPFs. Our wide range of experience includes GIS system management, in-depth crash diagnostic and crash data evaluation, programming, and statistics.</p>
        <p>Our product, SPF Tool, comprises the most advanced state-of-the-art methods integrated into a virtual user-friendly interface to support you in your transportation safety analysis. We train and help agencies to advance their evidence-based transportation data safety analysis.</p>
        <p>Please do not hesitate to contact us for more information about our services.</p>
    </div>
</section>
