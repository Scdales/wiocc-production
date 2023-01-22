<?php
/*
Template Name: Shareholders
*/
get_header();
?>

<?php
while ( have_posts() ) : the_post(); ?>

	<div class="page-banner"
	     style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
		<div class="wrap">
			<h2><?php the_title() ?></h2>
		</div>
	</div>
	<div class="section shareholder">
		<div class="wrap">
            <h4><?php echo rwmb_meta( 'wiocc-content_header' ) ?></h4>
			<h4><?php echo get_the_content()?> </h4>
            <img  class="all-shareholders desktop-version" id="Image-Maps-Com-image-maps-2019-01-16-140606" src="<?php echo get_template_directory_uri()?>/images/ShareholdersDecember2022.png" border="0" width="700" height="670" orgWidth="700" orgHeight="670" usemap="#image-maps-2019-01-16-140606" alt="" />
            <map class="desktop-version" name="image-maps-2019-01-16-140606" id="ImageMapsCom-image-maps-2019-01-16-140606">
                <area  alt="" title="" href="https://www.linkedin.com/company/djiboutitelecom/" shape="rect" coords="464,75,524,132" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="https://www.utl.co.ug/" shape="rect" coords="530,165,605,230" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="http://www.dalkomsomalia.com/" shape="rect" coords="616,247,700,306" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="https://telkom.co.ke/" shape="rect" coords="497,299,581,358" style="outline:none;" target="_self"     />
                <!--<area  alt="" title="" href="https://wiocc.net" shape="rect" coords="601,346,685,405" style="outline:none;" target="_self"     />-->
                <area  alt="" title="" href="http://www.tdm.mz/" shape="rect" coords="586,642,528,601" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="https://www.telone.co.zw/" shape="rect" coords="456,508,540,567" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="https://www.lca.org.ls/" shape="rect" coords="340,594,424,653" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="https://www.bofinet.co.bw/" shape="rect" coords="228,517,312,576" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="https://zantel.co.tz/" shape="rect" coords="197,424,281,483" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="https://www.facebook.com/OnatelBurundi/" shape="rect" coords="174,320,258,379" style="outline:none;" target="_self"     />
                <!--<area  alt="" title="" href="https://www.liquid.tech/" shape="rect" coords="65,320,149,379" style="outline:none;" target="_self"     />-->
                <!--<area  alt="" title="" href="http://gilat.net/" shape="rect" coords="5,238,89,297" style="outline:none;" target="_self"     />-->
                <!--<area  alt="" title="" href="https://lptic.ly/en/" shape="rect" coords="287,12,354,71" style="outline:none;" target="_self"     />-->
                <area target="_self" alt="" href="http://www.tmcel.mz/" coords="620,500,541,434" shape="rect" style="outline:none;">
                <area  alt="" title="" href="https://acagp.com/" shape="rect" coords="44,28,130,75" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="https://www.ifc.org/" shape="rect" coords="320,35,480,75" style="outline:none;" target="_self"     />
                <area shape="rect" coords="698,668,700,670" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_102300" />
            </map>
            <img class="mobile-version-shareholder-map" id="Image-Maps-Com-image-maps-2019-02-08-084958" src="<?php echo get_template_directory_uri()?>/images/ShareholdersDecember2022.png" border="0" width="337" height="323" orgWidth="337" orgHeight="323" usemap="#image-maps-2019-02-08-084958" alt="" />
            <map class="mobile-version-shareholder-map" name="image-maps-2019-02-08-084958" id="ImageMapsCom-image-maps-2019-02-08-084958">
                <!--<area  alt="" title="" href="https://lptic.ly/en/" shape="rect" coords="137,5,172,35" style="outline:none;" target="_self"     />-->
                <area  alt="" title="" href="https://www.linkedin.com/company/djiboutitelecom/" shape="rect" coords="220,40,254,66" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="https://www.utl.co.ug/" shape="rect" coords="254,79,288,110" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="http://www.dalkomsomalia.com/" shape="rect" coords="299,115,333,146" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="https://telkom.co.ke/" shape="rect" coords="241,144,277,175" style="outline:none;" target="_self"     />
                <!--<area  alt="" title="" href="https://wiocc.net" shape="rect" coords="292,165,326,196" style="outline:none;" target="_self"     />-->
                <area  alt="" title="" href="http://www.tmcel.mz/" shape="rect" coords="262,209,296,239" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="https://www.telone.co.zw/" shape="rect" coords="221,243,255,273" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="https://www.lca.org.ls/" shape="rect" coords="165,287,200,319" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="https://www.bofinet.co.bw/" shape="rect" coords="111,251,145,283" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="http://www.zantel.co.tz/" shape="rect" coords="95,204,130,236" style="outline:none;" target="_self"     />
                <area  alt="" title="" href="https://www.facebook.com/OnatelBurundi/" shape="rect" coords="84,155,118,185" style="outline:none;" target="_self"     />
                <!--<area  alt="" title="" href="https://www.liquid.tech/" shape="rect" coords="36,155,70,185" style="outline:none;" target="_self"     />-->
                <!--<area  alt="" title="" href="http://gilat.net/" shape="rect" coords="4,113,38,144" style="outline:none;" target="_self"     />-->
                <area  alt="" title="" href="https://acagp.com/" shape="rect" coords="15,16,60,40" style="outline:none;" target="_self"     />
                <area shape="rect" coords="391,355,393,357" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_102300" />
                <area  alt="" title="" href="https://www.ifc.org/" shape="rect" coords="150,18,240,39" style="outline:none;" target="_self"     />
            </map>

<!--            <div ></div><img src="--><?php //echo get_template_directory_uri()?><!--/images/shareholders.png" alt="">-->
            </div>
		</div><!--wrap-->
	</div> <!--ection contact-locations-->

<?php endwhile; ?>




<?php get_footer() ?>
