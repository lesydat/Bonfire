<?php
    echo theme_view('header');
    echo theme_view('_sitenav');
?>
<!-- Start of Main Container -->
<div class="container mt-4">
<?php
    echo Template::message();
    echo isset($content) ? $content : Template::content();
?>
</div>
<?php
    echo theme_view('footer');
?>