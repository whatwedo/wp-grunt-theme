<?php
/**
 * Front Page
 */
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <!-- Startseite -->
        <?php the_title(); ?>

        <?php the_content(); ?>
    </article>

    <?php comments_template(); ?>

<?php endwhile; ?>

<?php else : ?>

<!-- Artikel nicht gefunden -->

<?php endif; ?>

</div>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
