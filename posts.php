<?php
/**
 * @author Shycoder <https://shycoder.com>
 */

// add shortcode for displaying posts grid
add_shortcode('md_posts', 'md_posts');

function md_posts()
{
    md_posts_grid();
}

/**
 * Display posts grid
 */
function md_posts_grid()
{
    $posts = md_get_posts();
    $filter_arg = 'one-month-old';

    // display filter buttons
    md_filter_buttons();
?>
    <div cass="container">
        <div class="row">
            <?php
            while ($posts->have_posts()) {
                $posts->the_post();

                if (md_is_days_old(get_the_date(), 60)) {
                    $filter_arg = 'two-month-old';
                }

                if (md_is_days_old(get_the_date(), 360)) {
                    $filter_arg = 'one-year-old';
                }

            ?>
                <div class="col-md-4 mix <?php echo $filter_arg; ?>">
                    <h3><?php echo the_title() ?></h3>
                    <small><?php echo the_excerpt() ?> </small>
                </div>
            <?php
            }

            wp_reset_postdata();
            ?>
        </div>
    </div>
<?php
}

/**
 * Check if post was published x days ago
 * @param string $post_date $days 
 */
function md_is_days_old($post_date, $days)
{
    if (strtotime($post_date) < strtotime('-' . $days . 'days')) {
        return true;
    }

    return false;
}

/**
 * Fetch WordPress posts
 * @return query WP Query
 */
function md_get_posts()
{
    $args = array(
        'post_type' => 'post',
        'order' => 'DESC',
        'posts_per_page' => 6,
    );

    return new WP_Query($args);
}

/**
 * Display filter buttons
 */
function md_filter_buttons()
{
?>
    <div class="controls">
        <button type="button" data-filter="all">All</button>
        <button type="button" data-filter=".one-month-old">1 Month Old</button>
        <button type="button" data-filter=".two-month-old">2 Month Old</button>
        <button type="button" data-filter=".one-year-old">1 year Old</button>
    </div>
<?php
}