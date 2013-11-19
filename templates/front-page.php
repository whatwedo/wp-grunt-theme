<?php
/**
 * Front Page
 */
get_header(); ?>

<header class="header">
<?php
$post = get_field('post');
if($post): /** ist ein Blog-Beitrag geteaserd? **/
?>
    <article class="post-teaser">
        <h1><?php the_field('front-page-excerpt', $post->ID); ?></h1>
        <a class="button" href="<?php the_permalink($post->ID); ?>">Mehr lesen</a>
    </article>
<?php endif; ?>
</header>
<div id="content">
    <div class="page-intro">
        <?php the_field("introduction"); ?>
    </div>
    <section class="products">
        <h1>Produkte</h1>
        <ul class="products-list">
            <li>
                <a href="#">
                    <img src="http://placehold.it/350x150" alt="Produkt Bild"/>
                    <h2>Bezeichnung</h2>
                    <div class="product-price-preview">
                        CHF 29.-
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="http://placehold.it/350x150" alt="Produkt Bild"/>
                    <h2>Bezeichnung</h2>
                    <div class="product-price-preview">
                        CHF 29.-
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="http://placehold.it/350x150" alt="Produkt Bild"/>
                    <h2>Bezeichnung</h2>
                    <div class="product-price-preview">
                        CHF 29.-
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="http://placehold.it/350x150" alt="Produkt Bild"/>
                    <h2>Bezeichnung</h2>
                    <div class="product-price-preview">
                        CHF 29.-
                    </div>
                </a>
            </li>
        </ul>
    </section>

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
