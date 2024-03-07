</main>
</div>



<?php
	$footer_block_id = get_field("footer_block", "option");
	$footer_block = get_post($footer_block_id)->post_content;
?>
<footer class="footer" role="contentinfo">
	<div class="container">
		<?php if (get_field("footer_block", "option")) :
			$post_id = get_field("footer_block", "option");
			$header = get_post($post_id);
			setup_postdata($header);
			echo the_content();
			wp_reset_postdata();
		endif; ?>
	</div>
</footer>

<div class="fixed bottom-6 right-6 z-50 rounded-full bg-primary drop-shadow-sm h-24 w-24 flex items-center justify-center gap-2 hover:bg-primary-hover"> 
	<a href="https://ballejaune.com/club/tcboisy" class="flex flex-col items-center justify-center text-white no-underline ">
		<i class="animate-bounce text-xl fa-sharp fa-solid fa-tennis-ball"></i>
		<span class="text-[10px] font-display uppercase font-bold">Réserver</span>
	</a>
</div>


<footer class="copyright bg-primary" role="contentinfo">
	<div class="container text-xs text-white py-2 text-center">
		&copy; Copyright <?php echo date_i18n('Y'); ?> - <?php echo get_bloginfo('name'); ?> – <?php _e('Réalisé par', 'dc23') ?>  <a href="https://unprinted.ch" class="hover:text-primary-hover">unprinted</a>
	</div>
</footer>

</div>
<?php wp_footer(); ?>
</body>

</html>