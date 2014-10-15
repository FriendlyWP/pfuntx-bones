			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap cf footer-widgets">
					<?php if ( is_active_sidebar( 'footer1' ) ) : ?>

						<?php dynamic_sidebar( 'footer1' ); ?>
						<div class="widget">


						<?php if (function_exists('get_field') && get_field('street_address', 'option')) {
							
							?>
							<div itemscope itemtype="http://schema.org/Organization" class="organization-address">
								<h3 class="widgettitle">Contact us</h3>
								<span itemprop="name" style="font-weight:700;"><?php bloginfo( 'name' ); ?></span>
								<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							      <span itemprop="streetAddress"><?php the_field('street_address', 'option'); ?></span><br />
							      <span itemprop="addressLocality"><?php the_field('city', 'option'); ?></span>, <span itemprop="addressRegion"><?php the_field('state', 'option'); ?></span> <span itemprop="postal-code"><?php the_field('zip', 'option'); ?></span>
							   </div>
							   <div class="contact">
							   		<?php if (get_field('phone', 'option')) { ?>
							   			<span ><strong>Phone:</strong> <span itemprop="telephone"><?php the_field('phone', 'option'); ?></span></span>
							   		<?php } ?><br />
								   <?php if (get_field('contact_email', 'option')) { 
								   	$email = get_field('contact_email', 'option'); ?>
								   		<span>Email: <a style="font-weight:700;" href="mailto:<?php echo antispambot($email); ?>" target="_blank" itemprop="email"><?php echo antispambot($email); ?></a></span>
								   <?php } ?>
								   <?php if (get_field('contact_page_link', 'option')) { ?>
								   		<span class="item"><a href="<?php the_field('contact_page_link', 'option'); ?>">Contact Us</a></span>
								   <?php } ?>
								</div>
							</div>
							<?php
						} else { ?> 

						<?php } ?>
					</div>

					<?php else : ?>

					<?php endif; ?>

					

				</div>

				<?php if (function_exists('get_field') && get_field('copyrighted', 'option')) {
							?>
							<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <span><?php the_field('copyrighted', 'option' ); ?></span>. All Rights Reserved.</p>
							<?php
						} else { ?> 
							<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></p>
						<?php } ?>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
