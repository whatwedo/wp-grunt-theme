<?php
/**
 * Article
 */
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <?php the_title(); ?>

        <?php get_template_part('_contents'); ?>
    </article>

<?php endwhile; ?>

<?php else : ?>

<!-- Artikel nicht gefunden -->

<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
