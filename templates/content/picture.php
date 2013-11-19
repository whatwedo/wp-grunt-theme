<?php
/**
 * Flexible Layout for "Picture"
 */
$image = get_field('picture');
/**
Array
(
    [id] => 540
    [alt] => A Movie
    [title] => Movie Poster: UP
    [caption] => sweet image
    [description] => a man and a baloon
    [url] => http://localhost:8888/acf/wp-content/uploads/2012/05/up.jpg
    [sizes] => Array
        (
            [thumbnail] => http://localhost:8888/acf/wp-content/uploads/2012/05/up-150x150.jpg
            [medium] => http://localhost:8888/acf/wp-content/uploads/2012/05/up-300x119.jpg
            [large] => http://localhost:8888/acf/wp-content/uploads/2012/05/up.jpg
            [post-thumbnail] => http://localhost:8888/acf/wp-content/uploads/2012/05/up.jpg
            [large-feature] => http://localhost:8888/acf/wp-content/uploads/2012/05/up.jpg
            [small-feature] => http://localhost:8888/acf/wp-content/uploads/2012/05/up-500x199.jpg
        )

)
**/
?>
<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">