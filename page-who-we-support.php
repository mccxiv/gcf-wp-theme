<?php get_header(); ?>

<section class="content projects">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <div class="unpadded-content">

        <div class="project-area-selection clearfix">
            <div class="project-area-button waves-effect btn" data-area="health">
                <div class="text-wrapper">
                    <span>Health</span>
                </div>
            </div>
            <div class="project-area-button waves-effect btn" data-area="education">
                <div class="text-wrapper">
                    <span>Education</span>
                </div>
            </div>
            <div class="project-area-button waves-effect btn" data-area="environment">
                <div class="text-wrapper">
                    <span>Environment</span>
                </div>
            </div>
            <div class="project-area-button waves-effect btn" data-area="local-economic-development">
                <div class="text-wrapper">
                    <span>Local Economic Development</span>
                </div>
            </div>
            <div class="project-area-button waves-effect reset-button">
                <div class="text-wrapper">
                    <span>Reset and show all</span>
                </div>
            </div>
        </div>

        <div class="project-list">
            <?php $loop = new WP_Query(['post_type' => 'project', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC']); ?>
            <?php while ($loop->have_posts()): $loop->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="project">
                    <div class="name"><?php the_title(); ?></div>
                    <?php the_project_tags(); ?>
                </a>
            <?php endwhile; wp_reset_query(); ?>
        </div>

    </div>
</section>

<?php wp_enqueue_script('who-we-support'); ?>

<?php get_footer(); ?>