<?php get_header(); ?>
    <section id="primary" class="content-area">
        <main id="main" class="site-main">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php if (!class_exists('acf')) :
                        cal2eve_exists_plugin_acf(); ?>
                    <?php else:
                        the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
                    <?php endif; ?>
                </header>
                <div class="entry-content">
                    <table class="single_event">
                        <tr>
                            <th class="fz_big_h" colspan="3">Информация о мероприятии:</th>
                        </tr>
                        <tr>
                            <th class="single_event_term_name">Страна:</th>
                            <th class="single_event_term_name">Город:</th>
                            <th class="single_event_term_name">Дата:</th>
                        </tr>
                        <tr>
                            <td class="single_event_term_desc">
                                <?php if (!class_exists('acf')) {
                                    echo 'Ошибка';
                                } else {
                                    $cityEvent = get_the_terms($post->ID, 'cal2eve_cities');
                                    echo $cityEvent[0]->name;
                                }; ?>
                            </td>
                            <?php if (!class_exists('acf')) : ?>
                                <td class="single_event_term_desc">Ошибка</td>
                                <td class="single_event_term_desc">Ошибка</td>
                            <?php else: ?>
                                <td class="single_event_term_desc"><?php the_field('city_of_event'); ?></td>
                                <td class="single_event_term_desc"><?php the_field('date_of_event'); ?></td>
                            <?php endif; ?>
                        </tr>
                    </table>
                </div>
            </article>
        </main>
    </section>
<?php get_footer(); ?>