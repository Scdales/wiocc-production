<?php
/*
Template Name: Regional Maps
*/
get_header();
$options = get_option( 'wioocc_settings' );
?>
<div id="map-container" style="height: 900px; min-width: 310px; max-width: 1000px; margin: 0 auto">

</div>
<?php get_footer() ?>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/data.js"></script>
<script src="https://code.highcharts.com/mapdata/custom/world.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/map.js"></script>
