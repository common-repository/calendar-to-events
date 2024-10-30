<?php get_header(); ?>
    <section id="primary" class="content-area">
        <main id="main" class="site-main">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php if (!class_exists('acf')) :
                        cal2eve_exists_plugin_acf(); ?>
                    <?php else: ?>
                        <h2 class="entry-title"><?php echo single_term_title(); ?></h2>
                    <?php endif; ?>
                </header>
                <div class="entry-content">
                    <?php if (have_posts()) : ?>
                        <table class="archive-table-taxonomy">
                            <?php while (have_posts()) : the_post(); ?>
                                <tr>
                                    <?php if (!class_exists('acf')) : ?>
                                        <td><span><?php echo 'ошибка'; ?></span></td>
                                        <td><span><?php the_title(); ?></span></td>
                                    <?php else: ?>
                                        <td><span><?php the_field('date_of_event'); ?></span></td>
                                        <td><span><?php the_title(); ?></span></td>
                                    <?php endif; ?>

                                </tr>
                            <?php endwhile; ?>
                        </table>
                    <?php else: ?>
                        <p>Нет постов в цикле.</p>
                    <?php endif; ?>
                </div>
            </article>
        </main>
    </section>
<?php get_footer(); ?>