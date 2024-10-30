<?php
require_once(CAL_TO_EVE_PATH . '/models/custom_post_type.php');
register_post_type('cal2eve_events', $args_post_type_cal2eve_events);

add_filter('post_updated_messages', 'cal2eve_events_post_messages');
function cal2eve_events_post_messages($messages)
{
    global $post, $post_ID;
    $messages['events'] = [
        0 => '', // This index is not used
        1 => sprintf('Событие обновлено. <a href="%s">Просмотр</a>', esc_url(get_permalink($post_ID))),
        2 => 'Событие обновлено.',
        3 => 'Событие удалёно.',
        4 => 'Событие обновлено',
        5 => isset($_GET['revision']) ? sprintf('Событие восстановлено из редакции: %s', wp_post_revision_title((int)$_GET['revision'], false)) : false,
        6 => sprintf('Событие опубликовано на сайте. <a href="%s">Просмотр</a>', esc_url(get_permalink($post_ID))),
        7 => 'Функция сохранена.',
        8 => sprintf('Отправлено на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf('Запланировано на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf('Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    ];
    return $messages;
}


add_action('admin_head', 'cal2eve_events_post_help_tab');
function cal2eve_events_post_help_tab()
{
    $screen = get_current_screen();
    if ('cal2eve_events' != $screen->post_type) // Stop the function if you are on the pages of other types of posts
        return;
    // Array of parameters for the first tab
    $args = [
        'id' => 'tab_1',
        'title' => 'О плагине',
        'content' => '<h3 xmlns="http://www.w3.org/1999/html">Обзор плагина</h3>
                        <p>Поддерживает возможность <strong>вывода календаря за конкрентный месяц и год</strong>. Реализовано с помощью shortcode <code>[cal2eve month=... year=...]</code></p>
                        <p>Если не указать параметры, будет выведена текущая дата. Доступные параметры:</code></p>
                        <ol>
                        <li><code>Year</code> – год, который будет отображен при загрузке календаря.</li>
                        <li><code>Month</code> – месяц, который будет отображен при загрузке календаря.</li>
                        </ol>
                        <p>Пример: <code>[cal2eve month=0 year=2019]</code> – будет выведен календарь событий за январь 2019 года. Январь равен нулю, так как <strong>исчеление месяцев находиться в диапазоне 0..11</strong>.</p>
                        <p>Для корректного отобрадения пользовательских полей: <em>Город проведения</em> и <em>Дата проведения</em> <strong>необходимо установить плагин <a href="//wordpress.org/plugins/advanced-custom-fields/" target="_blank" rel="nofollow noopener">Advanced Custom Fields</a></strong>.</p>
                     '
    ];
    $screen->add_help_tab($args); // Add first tab
    // Parameter array for the second tab
    $args = [
        'id' => 'tab_2',
        'title' => 'Настройка',
        'content' => '<h3>Настройка плагина</h3>
                        <p>После установки плагина <a href="//wordpress.org/plugins/advanced-custom-fields/" target="_blank" rel="nofollow noopener">ACF</a> необходимо создать группу на два поля</p>
                        <ol>
                        <li>Дата првоедения:
                        <ul>
                        <li>ярлык поля: <mark>Дата проведения</mark></li>
                        <li>имя поля: <mark>date_of_event</mark></li>
                        <li>тип поля: <mark>jQuery → Дата</mark></li>
                        </ul>
                        </li>
                        <li>Городо проведения:
                        <ul>
                        <li>ярлык поля: <mark>Город проведения</mark></li>
                        <li>имя поля: <mark>city_of_event</mark></li>
                        <li>тип поля: <mark>Текст</mark></li>
                        </ul>
                        </li>
                        </ol>
                        <p>Или импортируйте в ACF <a href="#">этот файл</a> – это экспорт моих настроект, сделанный для ленивых :)</p>
                        <p>При установке будет создана станица с названием «Страница для Calendar-To-Events» (постоянная ссылка: /cal2eve-events). на ней будет автоматически размещен календарь с текущим месяцем и датой.</p>
                        <p>Если в дальнейшем не планируете использоваться этой страницей – можете удалить, а календари выводить по шорткоду <code>[cal2eve month=... year=...]</code>, где:</p>
                        <ul>
                        <li><code>year=</code> – год, который будет выведен при загрузке, если не указать – <em>берется текущий</em>.</li>
                        <li><code>month=</code> – месяц, который будет выведен при загрузке, если не указать – <em>берется текущий</em>.</li>
                        </ul>
                        <p>Создал десять тестовых событий, для демонстрации функционала плагина, скачать можно из <a href="#">репозитория Github</a> и импортировать через Инструменты → WordPress (<em>Импорт записей, страниц, комментариев, произвольных полей, рубрик и меток из файла экспорта WordPress</em>).</p>
                     '
    ];
    $screen->add_help_tab($args); // Add second tab
}