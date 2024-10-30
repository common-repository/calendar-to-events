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
                    <? if (have_posts()) : ?>
                        <header class="page-header">
                            <h1 class="page-title"><?php single_term_title(); ?></h1>
                        </header>
                        <table class="archive-table-taxonomy">
                            <? while (have_posts()) : the_post(); ?>
                                <tr>
                                    <?php if (!class_exists('acf')) : ?>
                                        <td><span><?php echo 'ошибка'; ?></span></td>
                                        <td><span><?php the_title(); ?></span></td>
                                    <?php else: ?>
                                        <td><span><?php the_field('gorod-provedeniya'); ?></span></td>
                                        <td><span><?php the_title(); ?></span></td>
                                    <?php endif; ?>
                                </tr>
                            <? endwhile; ?>
                        </table>
                    <? else: ?>
                        <p>Нет постов в цикле.</p>
                    <? endif; ?>
                </div>
            </article>
        </main>
    </section>
<? get_footer(); ?>