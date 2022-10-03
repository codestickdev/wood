<?php 
    /**
     * Template name: Activity
     */
get_header(); ?>

<main class="wood wood--activity">
    <section class="activity">
        <div class="activity__wrap container">
            <h1><?php the_title(); ?></h1>
            <div class="activity__video">
                <?php 
                    // Build the  Shortcode
                    $attr =  array(
                        'mp4'      => get_field('activityVideo')['url'],
                        'preload'  => 'auto'
                    );
                    
                    // Display the Shortcode
                    echo wp_video_shortcode($attr);
                ?>
            </div>
            <div class="activity__gallery">
                <?php
                $images = get_field('activityGallery');
                foreach($images as $image): ?>
                <a href="<?php echo $image['url']; ?>" class="slide" data-lightbox="activity">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>