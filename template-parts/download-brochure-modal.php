<div class="download-modal" style="display: none;">
	<div class="display-table">
		<div class="vertical-align">
			<div class="wrap">
				<a href="javascript:void(0)" class="close-modal"></a>
				<div class="notification">
					<div class="success-message">
						<i class="fa fa-check-circle"></i>
						<p><?php pll_e('Your Download will load shortly.'); ?></p>
					</div>
				</div>
				<div class="error-notification"></div>
				<div id="form-div">
					<h4>Download Brochure</h4>
					<p>
						<?php pll_e('Before you can download the WIOCC product Guide, we just need a few details from you.'); ?>
					</p>

					<form id="download-form" action="<?php echo admin_url('admin-ajax.php?action=download&nonce=' . wp_create_nonce("download ")) ?>">
						<div class="full-width">
							<div class="form-left">
								<div class="form-group">
									<input type="text" name="first_name" placeholder="First Name *">
								</div>
							</div>
							<div class="form-right">
								<div class="form-group">
									<input type="text"  name="last_name" placeholder="Last Name *">
								</div>
							</div>
						</div>

						<div class="full-width">
							<div class="form-left">
								<div class="form-group">
									<input type="email" name="email" placeholder="Email *">
								</div>
							</div>
						</div>

						<div class="check-area">
							<input type="checkbox" name="checker" value="checker" id="checker">
							<label for="checker">
								<?php pll_e('By ticking this, I consent to be contacted by WIOCC about their latest product offerings, events and news. *'); ?>
							</label>
						</div>

						<div class="form-group no-margin">
							<input type="submit" class="cta brochure-download" value="Download">
						</div>
						<?php if (!empty($args['link'])): ?>
							<input type="hidden"  name="file_link" value="<?php echo get_the_permalink($args['link']); ?> ">
						<?php endif; ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
