<?php
    /**
     * Template name: Home
     */
get_header(); ?>

<main id="top" class="wood wood--home">
    <section class="homeHeader">
        <img src="<?php echo get_template_directory_uri() . '/images/headerImage.png'; ?>" />
        <div class="homeHeader__wrap container-md">
            <div class="content">
                <?php echo get_field('homeHeader_content'); ?>
                <a href="#about" class="btn"><span><?php pll_e('Read more') ?> →</span></a>
            </div>
        </div>
        <div class="chicken">
            <img src="<?php echo get_template_directory_uri() . '/images/chicken.png'; ?>" />
        </div>
    </section>

    <section id="about" class="homeAbout">
        <div class="homeAbout__wrap container">
            <div class="homeAbout__heading">
                <h2><?php pll_e('About us') ?></h2>
            </div>
            <div class="homeAbout__content">
                <div class="left">
                    <?php echo get_field('homeAbout_content'); ?>
                </div>
                <div class="right">
                    <div class="right__images">
                        <div class="image">
                            <img src="<?php echo get_template_directory_uri() . '/images/aboutus_01.png'; ?>"/>
                        </div>
                        <div class="image">
                            <img src="<?php echo get_template_directory_uri() . '/images/aboutus_02.png'; ?>"/>
                        </div>
                        <div class="image">
                            <img src="<?php echo get_template_directory_uri() . '/images/aboutus_03.png'; ?>"/>
                        </div>
                        <div class="image">
                            <img src="<?php echo get_template_directory_uri() . '/images/aboutus_04.png'; ?>"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="products" class="homeProducts">
        <div class="homeProducts__wrap container-md">
            <div class="homeProducts__heading">
                <h2><?php pll_e('Products') ?></h2>
                <p><?php echo get_field('homeProducts_title'); ?></p>
            </div>
            <div class="homeProducts__list">
                <?php while(have_rows('homeProducts_list')): the_row();
                    $image = get_sub_field('homeProducts_list_image');
                    $icon = get_sub_field('homeProducts_list_icon');
                    $title = get_sub_field('homeProducts_list_title');
                    $lead = get_sub_field('homeProducts_list_lead');
                    $content = get_sub_field('homeProducts_list_content');
                    $images = get_sub_field('homeProducts_list_gallery');
                ?>
                <div class="product">
                    <div class="product__image">
                        <div class="icon">
                            <img src="<?php echo $icon['url'] ?>"/>  
                        </div>
                        <img src="<?php echo $image['url']; ?>" />
                    </div>
                    <div class="product__info">
                        <h3><?php echo $title; ?></h3>
                        <p class="lead"><?php echo $lead; ?></p>
                        <p><?php echo $content; ?></p>
                        <div class="gallery">
                            <?php foreach($images as $image): ?>
                                <a href="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" data-lightbox="<?php echo $title; ?>" data-title="<?php echo $title; ?>"></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="homeProducts__footer">
                <p><?php pll_e('If you fee interested in our offer we invite for contact') ?>.<a href="mailto:office@wood-zoo.pl">office@wood-zoo.pl</a></p>
            </div>
        </div>
    </section>

    <section id="production" class="homeProduction">
        <div class="homeProduction__wrap container-md">
            <div class="homeProduction__heading">
                <h2><?php pll_e('Production process'); ?></h2>
            </div>
            <div class="homeProduction__list">
                <?php while(have_rows('homeProduction_list')): the_row();
                    $icon = get_sub_field('homeProduction_list_icon');
                    $content = get_sub_field('homeProduction_list_content');
                ?>
                <div class="step">
                    <div class="step__icon">
                        <img src="<?php echo $icon['url'] ?>" />
                    </div>
                    <p><?php echo $content; ?></p>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <section id="contact" class="homeContact">
        <div class="homeContact__wrap container">
            <div class="homeContact__heading">
                <h2><?php pll_e('Contact'); ?></h2>
                <p><?php pll_e('Let us stay in touch!'); ?></p>
            </div>
            <div class="homeContact__content">
                <a href="#page" class="logo">
                    <img src="<?php echo get_template_directory_uri() . '/images/logo_big.png'; ?>" />
                </a>
                <div class="info">
                    <p><?php echo get_field('homeContact_address'); ?>
                    <a href="mailto:office@woodzoo.pl">office@woodzoo.pl</a></p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>