<?php
/**
 * Archive
 */
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <?php the_title(); ?>

        <?php the_excerpt(); ?>

        <a href="<?php the_permalink(); ?>">Continue reading</a>
    </article>

<?php endwhile; ?>


<nav class="wp-prev-next">
    <?php next_posts_link( __( '&laquo; Older Entries' )) ?>
    <?php previous_posts_link( __( 'Newer Entries &raquo;' )) ?>
</nav>

<?php else : ?>

<!-- There aren't any posts -->

<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
