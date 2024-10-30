<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <header id="masthead">
        <div class="site-branding-container">
            <?php get_template_part('template-parts/header/site', 'branding'); ?>
        </div><!-- .site-branding-container -->
    </header>
    <div id="content" class="site-content">
        <section id="primary" class="content-area">
            <main id="main" class="site-main">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php
                        if (is_sticky() && is_home() && !is_paged()) {
                            printf('<span class="sticky-post">%s</span>', _x('Featured', 'post', 'twentynineteen'));
                        }
                        if (is_singular()) :
                            the_title('<h1 class="entry-title">', '</h1>');
                        else :
                            the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
                        endif;
                        ?>
                    </header>
                    <div class="entry-content">
                        <div id="eventCalendar"></div>
                    </div>
                </article>
            </main>
        </section>
    </div>
    <footer id="colophon" class="site-footer">
        <script>
            jQuery(function() {
                jQuery('#eventCalendar').eventCalendar({
                    eventsLimit: 0,
                    jsonData: <?php echo '[' . cal2eve_get_json_for_calendar($events) . ']'; ?>,
                    customDateYear: <?php echo cal2eve_blog_time()['year']; ?>,
                    customDateMonth: <?php echo cal2eve_blog_time()['month']; ?>,
                });
            });
        </script>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>