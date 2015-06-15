<?php get_header(); ?>

<!-- Index! -->

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <section class="content shadow">
            <h1><?php the_title(); ?></h1>

            <?php if (get_field('image-1')): wp_enqueue_script('') ?>
                <div class="gallery">
                    <?php for ($i = 1; $i < 6; $i++): ?>
                        <?php if (get_field("image-$i")): ?>
                            <img src="<?php the_field("image-$i"); ?>">
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>

            <?php the_content(); ?>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>