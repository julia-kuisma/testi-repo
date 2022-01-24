<section class="yleinen-lohko">
    <?php $lohko = get_field('lohko');
    setup_postdata($lohko->ID);
    the_content();
    wp_reset_postdata(); ?>
</section>