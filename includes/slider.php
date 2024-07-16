<?php
// Create shortcode to display slider
function mkhs_slider_shortcode($atts)
{
    ob_start();
?>
    <!-- carousel -->
    <div class="carousel">
        <?php
        $args = array(
            'posts_per_page' => 5,
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $slider_query = new WP_Query($args);

        if ($slider_query->have_posts()) : ?>
            <!-- list item -->
            <div class="list">
                <?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
                    <div class="item">
                        <?php if (has_post_thumbnail()) : ?>
                        
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        <div class="overlay"></div>
                     
                        <?php else : ?>
                           
                            <img src="<?php echo plugin_dir_url(__FILE__); ?>../image/img6.png" alt="Default Image">
                            <div class="overlay"></div>
                            
                        <?php endif; ?>


                        <div class="content">
                            <div class="author"><span class="badge">Featured</span></div>
                            <div class="title"><?php the_title(); ?></div>
                            <div class="des">
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="buttons">
                                <a class="read-more-text" href="<?php the_permalink(); ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e('No posts found'); ?></p>
        <?php endif; ?>

        <?php
        $thumbnail_query = new WP_Query($args);

        if ($thumbnail_query->have_posts()) : ?>
            <div class="thumbnail">
                <?php while ($thumbnail_query->have_posts()) : $thumbnail_query->the_post(); ?>
                    <div class="item">
                        <?php if (has_post_thumbnail()) : ?>
                            
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">

                            <div class="overlay"></div>
                            
                        <?php else : ?>
                            
                            <img src="<?php echo plugin_dir_url(__FILE__); ?>../image/img6.png" alt="Default Image">

                            <div class="overlay"></div>
                        <?php endif; ?>
                        
                        <div class="content">
                            <div class="thumbtitle"><?php the_title(); ?></div>
                            <div class="description"><?php the_excerpt(); ?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e('No posts found'); ?></p>
        <?php endif; ?>
        <!-- next prev -->
        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <!-- time running -->
        <div class="time"></div>
    </div>
<?php
    return ob_get_clean();
}

add_shortcode('mkhs_slider_0855', 'mkhs_slider_shortcode');
