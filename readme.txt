=== Calendar-To-Events ===
Contributors: yaleksandr89
Donate link: https://money.yandex.ru/to/410014510582174?_openstat=iget%3Btransfer%3Bicon
Tags: calendar, calendars, events, event, organizer, venue, cal2eve, calendar-to-events, calendar-events
Requires at least: 4.0
Tested up to: 5.3.1
Stable tag: 1.0.0
Requires PHP: 5.6
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Calendar-To-Events – this is a convenient plugin calendar events with the ability to display a certain month and year.

== Features ==

* Ability to add a calendar using the shortcode `[cal2eve month=... year=...]`
* Template for taxonomies
* Template for custom post type

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload plugin to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. [OPTIONAL]Demo events, [plugin-acf-import-for-cal2eve.json](https://github.com/yaleksandr89/cal2eve/blob/master/demo-content/plugin-acf-import-for-cal2eve.json)
4. [OPTIONAL]ACF fields import file, [demo-events.xml](https://github.com/yaleksandr89/cal2eve/blob/master/demo-content/demo-events.xml)

== Demo video ==
https://www.youtube.com/watch?v=61ihTLWOwMc

== Bundled translations ==
* Russian

== Frequently Asked Questions ==

= Ошибка при отображение пользовательских полей: "Город проведения", "Дата проведения". =

Для корректного отображения данных полей, необходимо установить плагин ACF и создать 2 поля или импортировать файл, который находится в [репозитории Github плагина](https://github.com/yaleksandr89/cal2eve/blob/master/demo-content/plugin-acf-import-for-cal2eve.json)

=  Как вывести календарь за определенный {YEAR} и {MONTH}? =

При вставке шорткода `[cal2eve]` на страницу, необходимо указать 2 параметра:

1. `year={YEAR}`
2. `month={MONTH}`

Если какой-то из параметров не указан, то берется текущее значение. Например:

* `[cal2eve]` – текущая дата
* `[cal2eve year=0, month=2019]` – Январь 2019 (месяц = 0, так как исчесление месяцев находиться в диапазоне 0...11)

= После установки появилась страница с названием  Страница для Calendar-To-Events (url: .../cal2eve-events). Можно ли её удалить? =

Да. Эта страница создается для демонстрации функционала календаря событий. 
Если в дальнейшем планируете использовать вставку шорткодом и страницей не собираетесь пользоваться – удаляйте.

= Can I contribute? =

Yes you can!

* Join in on my [GitHub repository](https://github.com/yaleksandr89/cal2eve)
* Add to friends [Facebook](https://www.facebook.com/y.alexander89)
* Add to friends [Vkontakte](https://vk.com/y.aleksandr89)

== Screenshots ==

1. Активация
2. Проверка наличия ACF
3. Добавление произвольных полей в ACF
4. Проверка условия отображения
5. Примеры использования shortcode
6. вывод календаря на странице

== Demo ==

[Calendar example page](http://wp.alexanderyurchenko.ru/)

== Donate link: ==
* [PayPal](https://www.paypal.me/yalexander89)
* [YandexMoney](https://money.yandex.ru/to/410014510582174?_openstat=iget%3Btransfer%3Bicon)

== Upgrade Notice ==

Release

== Changelog ==

= 1.0 =

* Release