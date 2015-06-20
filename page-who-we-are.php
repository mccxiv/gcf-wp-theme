<?php get_header(); ?>

<section class="content members">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php $loop = new WP_Query(['post_type' => 'member', 'posts_per_page' => -1]); ?>
    <?php while ($loop->have_posts()): $loop->the_post(); ?>
        <hr>
        <div class="member">
            <?php the_portrait(); ?>
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>
    <?php endwhile; wp_reset_query(); ?>
</section>

<?php get_footer(); ?>