<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <section class="content">
            <?php the_breadcrumbs(); ?>

            <h1><?php the_title(); ?></h1>

            <?php the_slider(); ?>

            <?php the_content(); ?>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>