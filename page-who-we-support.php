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
            <div class="project-area-button waves-effect waves-light btn" data-area="health">
                <span>Health</span>
            </div>
            <div class="project-area-button waves-effect waves-light btn" data-area="education">
                <span>Education</span>
            </div>
            <div class="project-area-button waves-effect waves-light btn" data-area="environment">
                <span>Environment</span>
            </div>
            <div class="project-area-button waves-effect waves-light btn" data-area="local-economic-development">
                <span>Local Economic Development</span>
            </div>
            <div class="project-area-button waves-effect reset-button">
                <span>Reset and show all</span>
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

<script>
    (function($) {

        var buttons = $('.project-area-button');

        var COLORS = {
            'health': 'hsl(303, 40%, 95%)',
            'education': 'hsl(56, 40%, 94%)',
            'environment': 'hsl(229, 40%, 95%)',
            'local-economic-development': 'hsl(0, 40%, 95%)'
        };

        buttons.each(function() {
            var area = $(this).data('area');
            $(this).css('background-color', COLORS[area]);
        });

        $('.project-area-tag').each(function() {
            $(this).css('background-color', COLORS[$(this).data('area')]);
        });

        buttons.on('click', function() {
            var button = $(this);
            var area = button.data('area');
            var projects = $('.project');

            /*if (button.hasClass('selected')) {
                button.removeClass('selected');
                $('.project-list').css('background-color', 'transparent');
                projects.show('fast');
            }*/

            if (button.hasClass('reset-button')) {
                $('.project-list').css('background-color', 'transparent');
                $('.project-area-button').removeClass('selected');
                button.hide('fast');
                projects.show('fast');
            }

            else {
                $('.reset-button').show('fast').css('display', 'table');
                $('.project-list').css('background-color', COLORS[area]);
                $('.project-area-button').removeClass('selected');
                button.addClass('selected');
                projects.hide('fast').each(function() {
                    var project = $(this);
                    project.find('.project-area-tag').each(function() {
                        if ($(this).data('area') === area) {
                            project.show('fast');
                        }
                    });
                });
            }
        });

    })(jQuery);
</script>

<?php get_footer(); ?>