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

<div class="fixed bottom-6 right-6 z-50"> 
	<a href="https://wa.me/+41763701299" class="p-6 rounded-full bg-primary drop-shadow-sm h-24 w-24 flex items-center justify-center gap-2 hover:bg-primary-hover -rotate-12 hover:rotate-0 transition-all no-underline font-bold text-white text-xl leading-[18px]">
		COU <br> COU!
	</a>
</div>


<footer class="copyright bg-primary" role="contentinfo">
	<div class="container text-xs text-white py-2 text-center">
		&copy; Copyright <?php echo date_i18n('Y'); ?> – <a href="https://unprinted.ch" class="hover:text-primary-hover">unprinted</a>
	</div>
</footer>

</div>
<?php wp_footer(); ?>
</body>

</html>