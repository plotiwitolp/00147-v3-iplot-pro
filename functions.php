<?php

add_action('wp_enqueue_scripts', 'theme_name_scripts');
function theme_name_scripts()
{
    $version = '3.2';
    // start styles
    wp_enqueue_style('css-main', get_stylesheet_uri(), array(), $version);
    wp_enqueue_style('css-fonts',  get_template_directory_uri() . '/assets/fonts/montserrat/stylesheet.css', array(), $version);
    wp_enqueue_style('css-font-awesome',  'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), $version);
    wp_enqueue_style('css-custom-main',  get_template_directory_uri() . '/assets/css/main.css', array(), $version);
    wp_enqueue_style('css-animatecss',  get_template_directory_uri() . '/assets/libs/animatecss/animate.min.css', array(), $version);
    wp_enqueue_style('css-slick',  get_template_directory_uri() . '/assets/libs/slick/slick.css', array(), $version);
    wp_enqueue_style('css-lightbox',  'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css', array(), $version);

    // start scripts
    wp_enqueue_script('js-m', get_template_directory_uri() . '/assets/js/tools.js', array(), $version, false);
    wp_enqueue_script('js-jquery', get_template_directory_uri() . '/assets/libs/jquery/jquery-3.6.0.min.js', array(), $version, true);
    wp_enqueue_script('js-custom', get_template_directory_uri() . '/assets/js/custom.js', array('js-jquery'), $version, true);
    wp_enqueue_script('js-wow', get_template_directory_uri() . '/assets/libs/wow/wow.min.js', array(), $version, true);
    wp_enqueue_script('js-slick', get_template_directory_uri() . '/assets/libs/slick/slick.min.js', array(), $version, true);
    wp_enqueue_script('js-lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js', array(), $version, true);
}

add_action('after_setup_theme', 'theme_register_nav_menu');

function theme_register_nav_menu()
{
    register_nav_menu('primary', 'Главное меню');
}

function theme_prefix_setup()
{
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'theme_prefix_setup');

add_theme_support('post-thumbnails');


function create_portfolio_post_type()
{
    register_post_type(
        'portfolio',
        array(
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-portfolio',
            'labels' => array(
                'name' => __('Портфолио'),
                'singular_name' => __('Портфолио'),
                'add_new' => __('Добавить новое портфолио'),
            ),
            'supports' => array('title', 'editor', 'thumbnail', 'tag'),
            'rewrite' => array('slug' => 'archive_portfolio'),
            'menu_position'      => 4,
            'taxonomies' => array('post_tag')
        )
    );
}
function create_technology_post_type()
{
    register_post_type(
        'technology',
        array(
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-admin-generic',
            'labels' => array(
                'name' => __('Технологии'),
                'singular_name' => __('Технология'),
                'add_new' => __('Добавить новую технологию'),
            ),
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite' => array('slug' => 'technology'),
            'menu_position'      => 5,
        )
    );
}
function create_reviews_post_type()
{
    register_post_type(
        'reviews',
        array(
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-feedback',
            'labels' => array(
                'name' => __('Отзывы'),
                'singular_name' => __('Отзыв'),
                'add_new' => __('Добавить новый отзыв'),
            ),
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite' => array('slug' => 'archive_reviews'),
            'menu_position'      => 6,
        )
    );
}
function create_blog_post_type()
{
    register_post_type(
        'blog',
        array(
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-welcome-write-blog',
            'labels' => array(
                'name' => __('Блог'),
                'singular_name' => __('Блог'),
                'add_new' => __('Добавить новый пост'),
            ),
            'supports' => array('title', 'editor', 'thumbnail', 'tag'),
            'rewrite' => array('slug' => 'archive_blog'),
            'menu_position'      => 7,
        )
    );
}
add_action('init', 'create_portfolio_post_type');
add_action('init', 'create_technology_post_type');
add_action('init', 'create_reviews_post_type');
add_action('init', 'create_blog_post_type');

// start remove excess from the admin panel
function remove_console_menu()
{
    remove_menu_page('index.php');
}
add_action('admin_menu', 'remove_console_menu');

function remove_posts_menu()
{
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_posts_menu');

function remove_comments_menu()
{
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_comments_menu');

// end remove excess from the admin panel



// start пагинация
function custom_posts_per_page($query)
{
    if (!is_admin() && is_post_type_archive('portfolio')) {
        $query->set('posts_per_page', 8);
    } elseif (!is_admin() && is_post_type_archive('blog')) {
        $query->set('posts_per_page', 8);
    }
}
add_action('pre_get_posts', 'custom_posts_per_page');

// end пагинация


// start навигационная цепочка (хлебные крошки)
/**
 * Хлебные крошки для WordPress (breadcrumbs)
 *
 * @param string $sep  Разделитель. По умолчанию ' » '.
 * @param array  $l10n Для локализации. См. переменную `$default_l10n`.
 * @param array  $args Опции. Смотрите переменную `$def_args`.
 *
 * @return void Выводит на экран HTML код
 *
 * version 3.3.3
 */
function kama_breadcrumbs($sep = ' » ', $l10n = array(), $args = array())
{
    $kb = new Kama_Breadcrumbs;
    echo $kb->get_crumbs($sep, $l10n, $args);
}

class Kama_Breadcrumbs
{
    public $arg;
    // Локализация
    static $l10n = [
        'home'       => 'Главная',
        'paged'      => 'Страница %d',
        '_404'       => 'Ошибка 404',
        'search'     => 'Результаты поиска по запросу - <b>%s</b>',
        'author'     => 'Архив автора: <b>%s</b>',
        'year'       => 'Архив за <b>%d</b> год',
        'month'      => 'Архив за: <b>%s</b>',
        'day'        => '',
        'attachment' => 'Медиа: %s',
        'tag'        => 'Записи по метке: <b>%s</b>',
        'tax_tag'    => '%1$s из "%2$s" по тегу: <b>%3$s</b>',
        // tax_tag выведет: 'тип_записи из "название_таксы" по тегу: имя_термина'.
        // Если нужны отдельные холдеры, например только имя термина, пишем так: 'записи по тегу: %3$s'
    ];

    // Параметры по умолчанию
    static $args = [
        // выводить крошки на главной странице
        'on_front_page'   => true,
        // показывать ли название записи в конце (последний элемент). Для записей, страниц, вложений
        'show_post_title' => true,
        // показывать ли название элемента таксономии в конце (последний элемент). Для меток, рубрик и других такс
        'show_term_title' => true,
        // шаблон для последнего заголовка. Если включено: show_post_title или show_term_title
        'title_patt'      => '<span class="kb_title">%s</span>',
        // показывать последний разделитель, когда заголовок в конце не отображается
        'last_sep'        => true,
        // 'markup' - микроразметка. Может быть: 'rdf.data-vocabulary.org', 'schema.org', '' - без микроразметки
        // или можно указать свой массив разметки:
        // array( 'wrappatt'=>'<div class="kama_breadcrumbs">%s</div>', 'linkpatt'=>'<a href="%s">%s</a>', 'sep_after'=>'', )
        'markup'          => 'schema.org',
        // приоритетные таксономии, нужно когда запись в нескольких таксах
        'priority_tax'    => ['category'],
        // 'priority_terms' - приоритетные элементы таксономий, когда запись находится в нескольких элементах одной таксы одновременно.
        // Например: array( 'category'=>array(45,'term_name'), 'tax_name'=>array(1,2,'name') )
        // 'category' - такса для которой указываются приор. элементы: 45 - ID термина и 'term_name' - ярлык.
        // порядок 45 и 'term_name' имеет значение: чем раньше тем важнее. Все указанные термины важнее неуказанных...
        'priority_terms'  => [],
        // добавлять rel=nofollow к ссылкам?
        'nofollow'        => false,

        // служебные
        'sep'             => '',
        'linkpatt'        => '',
        'pg_end'          => '',
    ];

    function get_crumbs($sep, $l10n, $args)
    {
        global $post, $wp_post_types;

        self::$args['sep'] = $sep;

        // Фильтрует дефолты и сливает
        $loc = (object) array_merge(apply_filters('kama_breadcrumbs_default_loc', self::$l10n), $l10n);
        $arg = (object) array_merge(apply_filters('kama_breadcrumbs_default_args', self::$args), $args);

        $arg->sep = '<span class="kb_sep">' . $arg->sep . '</span>'; // дополним

        // упростим
        $sep = &$arg->sep;
        $this->arg = &$arg;

        // микроразметка ---
        if (1) {
            $mark = &$arg->markup;

            // Разметка по умолчанию
            if (!$mark) {
                $mark = [
                    'wrappatt'  => '<div class="breadcrumbs">%s</div>',
                    'linkpatt'  => '<a href="%s">%s</a>',
                    'sep_after' => '',
                ];
            }
            // rdf
            elseif ($mark === 'rdf.data-vocabulary.org') {
                $mark = [
                    'wrappatt'  => '<div class="kama_breadcrumbs" prefix="v: http://rdf.data-vocabulary.org/#">%s</div>',
                    'linkpatt'  => '<span typeof="v:Breadcrumb"><a href="%s" rel="v:url" property="v:title">%s</a>',
                    'sep_after' => '</span>', // закрываем span после разделителя!
                ];
            }
            // schema.org
            elseif ($mark === 'schema.org') {
                $mark = [
                    'wrappatt'  => '<div class="kama_breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">%s</div>',
                    'linkpatt'  => '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="%s" itemprop="item"><span itemprop="name">%s</span></a></span>',
                    'sep_after' => '',
                ];
            } elseif (!is_array($mark)) {
                die(__CLASS__ . ': "markup" parameter must be array...');
            }

            $wrappatt = $mark['wrappatt'];
            $arg->linkpatt = $arg->nofollow ? str_replace('<a ', '<a rel="nofollow"', $mark['linkpatt']) : $mark['linkpatt'];
            $arg->sep .= $mark['sep_after'] . "\n";
        }

        $linkpatt = $arg->linkpatt; // упростим

        $q_obj = get_queried_object();

        // может это архив пустой таксы
        $ptype = null;
        if (!$post) {
            if (isset($q_obj->taxonomy)) {
                $ptype = $wp_post_types[get_taxonomy($q_obj->taxonomy)->object_type[0]];
            }
        } else {
            $ptype = $wp_post_types[$post->post_type];
        }

        // paged
        $arg->pg_end = '';
        $paged_num = get_query_var('paged') ?: get_query_var('page');
        if ($paged_num) {
            $arg->pg_end = $sep . sprintf($loc->paged, (int) $paged_num);
        }

        $pg_end = $arg->pg_end; // упростим

        $out = '';

        if (is_front_page()) {
            return $arg->on_front_page ? sprintf($wrappatt, ($paged_num ? sprintf($linkpatt, get_home_url(), $loc->home) . $pg_end : $loc->home)) : '';
        }
        // страница записей, когда для главной установлена отдельная страница.
        elseif (is_home()) {
            $out = $paged_num ? (sprintf($linkpatt, get_permalink($q_obj), esc_html($q_obj->post_title)) . $pg_end) : esc_html($q_obj->post_title);
        } elseif (is_404()) {
            $out = $loc->_404;
        } elseif (is_search()) {
            $out = sprintf($loc->search, esc_html($GLOBALS['s']));
        } elseif (is_author()) {
            $tit = sprintf($loc->author, esc_html($q_obj->display_name));
            $out = ($paged_num ? sprintf($linkpatt, get_author_posts_url($q_obj->ID, $q_obj->user_nicename) . $pg_end, $tit) : $tit);
        } elseif (is_year() || is_month() || is_day()) {
            $y_url = get_year_link($year = get_the_time('Y'));

            if (is_year()) {
                $tit = sprintf($loc->year, $year);
                $out = ($paged_num ? sprintf($linkpatt, $y_url, $tit) . $pg_end : $tit);
            }
            // month day
            else {
                $y_link = sprintf($linkpatt, $y_url, $year);
                $m_url = get_month_link($year, get_the_time('m'));

                if (is_month()) {
                    $tit = sprintf($loc->month, get_the_time('F'));
                    $out = $y_link . $sep . ($paged_num ? sprintf($linkpatt, $m_url, $tit) . $pg_end : $tit);
                } elseif (is_day()) {
                    $m_link = sprintf($linkpatt, $m_url, get_the_time('F'));
                    $out = $y_link . $sep . $m_link . $sep . get_the_time('l');
                }
            }
        }
        // Древовидные записи
        elseif (is_singular() && $ptype->hierarchical) {
            $out = $this->_add_title($this->_page_crumbs($post), $post);
        }
        // Таксы, плоские записи и вложения
        else {
            $term = $q_obj; // таксономии

            // определяем термин для записей (включая вложения attachments)
            if (is_singular()) {
                // изменим $post, чтобы определить термин родителя вложения
                if (is_attachment() && $post->post_parent) {
                    $save_post = $post; // сохраним
                    $post = get_post($post->post_parent);
                }

                // учитывает если вложения прикрепляются к таксам древовидным - все бывает :)
                $taxonomies = get_object_taxonomies($post->post_type);
                // оставим только древовидные и публичные, мало ли...
                $taxonomies = array_intersect($taxonomies, get_taxonomies([
                    'hierarchical' => true,
                    'public'       => true,
                ]));

                if ($taxonomies) {
                    // сортируем по приоритету
                    if (!empty($arg->priority_tax)) {

                        usort($taxonomies, static function ($a, $b) use ($arg) {
                            $a_index = array_search($a, $arg->priority_tax);
                            if ($a_index === false) {
                                $a_index = 9999999;
                            }

                            $b_index = array_search($b, $arg->priority_tax);
                            if ($b_index === false) {
                                $b_index = 9999999;
                            }

                            return ($b_index === $a_index) ? 0 : ($b_index < $a_index ? 1 : -1); // меньше индекс - выше
                        });
                    }

                    // пробуем получить термины, в порядке приоритета такс
                    foreach ($taxonomies as $taxname) {

                        if ($terms = get_the_terms($post->ID, $taxname)) {
                            // проверим приоритетные термины для таксы
                            $prior_terms = &$arg->priority_terms[$taxname];

                            if ($prior_terms && count($terms) > 2) {

                                foreach ((array) $prior_terms as $term_id) {
                                    $filter_field = is_numeric($term_id) ? 'term_id' : 'slug';
                                    $_terms = wp_list_filter($terms, [$filter_field => $term_id]);

                                    if ($_terms) {
                                        $term = array_shift($_terms);
                                        break;
                                    }
                                }
                            } else {
                                $term = array_shift($terms);
                            }

                            break;
                        }
                    }
                }

                // вернем обратно (для вложений)
                if (isset($save_post)) {
                    $post = $save_post;
                }
            }

            // вывод

            // все виды записей с терминами или термины
            if ($term && isset($term->term_id)) {
                $term = apply_filters('kama_breadcrumbs_term', $term);

                // attachment
                if (is_attachment()) {
                    if (!$post->post_parent) {
                        $out = sprintf($loc->attachment, esc_html($post->post_title));
                    } else {
                        if (!$out = apply_filters('attachment_tax_crumbs', '', $term, $this)) {
                            $_crumbs = $this->_tax_crumbs($term, 'self');
                            $parent_tit = sprintf($linkpatt, get_permalink($post->post_parent), get_the_title($post->post_parent));
                            $_out = implode($sep, [$_crumbs, $parent_tit]);
                            $out = $this->_add_title($_out, $post);
                        }
                    }
                }
                // single
                elseif (is_single()) {
                    if (!$out = apply_filters('post_tax_crumbs', '', $term, $this)) {
                        $_crumbs = $this->_tax_crumbs($term, 'self');
                        $out = $this->_add_title($_crumbs, $post);
                    }
                }
                // не древовидная такса (метки)
                elseif (!is_taxonomy_hierarchical($term->taxonomy)) {
                    // метка
                    if (is_tag()) {
                        $out = $this->_add_title('', $term, sprintf($loc->tag, esc_html($term->name)));
                    }
                    // такса
                    elseif (is_tax()) {
                        $post_label = $ptype->labels->name;
                        $tax_label = $GLOBALS['wp_taxonomies'][$term->taxonomy]->labels->name;
                        $out = $this->_add_title('', $term, sprintf($loc->tax_tag, $post_label, $tax_label, esc_html($term->name)));
                    }
                }
                // древовидная такса (рибрики)
                elseif (!$out = apply_filters('term_tax_crumbs', '', $term, $this)) {
                    $_crumbs = $this->_tax_crumbs($term, 'parent');
                    $out = $this->_add_title($_crumbs, $term, esc_html($term->name));
                }
            }
            // влоежния от записи без терминов
            elseif (is_attachment()) {
                $parent = get_post($post->post_parent);
                $parent_link = sprintf($linkpatt, get_permalink($parent), esc_html($parent->post_title));
                $_out = $parent_link;

                // вложение от записи древовидного типа записи
                if (is_post_type_hierarchical($parent->post_type)) {
                    $parent_crumbs = $this->_page_crumbs($parent);
                    $_out = implode($sep, [$parent_crumbs, $parent_link]);
                }

                $out = $this->_add_title($_out, $post);
            }
            // записи без терминов
            elseif (is_singular()) {
                $out = $this->_add_title('', $post);
            }
        }

        // замена ссылки на архивную страницу для типа записи
        $home_after = apply_filters('kama_breadcrumbs_home_after', '', $linkpatt, $sep, $ptype);

        if ('' === $home_after) {
            // Ссылка на архивную страницу типа записи для: отдельных страниц этого типа; архивов этого типа; таксономий связанных с этим типом.
            if (
                $ptype && $ptype->has_archive && !in_array($ptype->name, ['post', 'page', 'attachment'])
                && (is_post_type_archive() || is_singular() || (is_tax() && in_array($term->taxonomy, $ptype->taxonomies)))
            ) {
                $pt_title = $ptype->labels->name;

                // первая страница архива типа записи
                if (is_post_type_archive() && !$paged_num) {
                    $home_after = sprintf($this->arg->title_patt, $pt_title);
                }
                // singular, paged post_type_archive, tax
                else {
                    $home_after = sprintf($linkpatt, get_post_type_archive_link($ptype->name), $pt_title);

                    $home_after .= (($paged_num && !is_tax()) ? $pg_end : $sep); // пагинация
                }
            }
        }

        $before_out = sprintf($linkpatt, home_url(), $loc->home) . ($home_after ? $sep . $home_after : ($out ? $sep : ''));

        $out = apply_filters('kama_breadcrumbs_pre_out', $out, $sep, $loc, $arg);

        $out = sprintf($wrappatt, $before_out . $out);

        return apply_filters('kama_breadcrumbs', $out, $sep, $loc, $arg);
    }

    function _page_crumbs($post)
    {
        $parent = $post->post_parent;

        $crumbs = [];
        while ($parent) {
            $page = get_post($parent);
            $crumbs[] = sprintf($this->arg->linkpatt, get_permalink($page), esc_html($page->post_title));
            $parent = $page->post_parent;
        }

        return implode($this->arg->sep, array_reverse($crumbs));
    }

    function _tax_crumbs($term, $start_from = 'self')
    {
        $termlinks = [];
        $term_id = ($start_from === 'parent') ? $term->parent : $term->term_id;
        while ($term_id) {
            $term = get_term($term_id, $term->taxonomy);
            $termlinks[] = sprintf($this->arg->linkpatt, get_term_link($term), esc_html($term->name));
            $term_id = $term->parent;
        }

        if ($termlinks) {
            return implode($this->arg->sep, array_reverse($termlinks));
        }

        return '';
    }

    // добалвяет заголовок к переданному тексту, с учетом всех опций. Добавляет разделитель в начало, если надо.
    function _add_title($add_to, $obj, $term_title = '')
    {

        // упростим...
        $arg = &$this->arg;
        // $term_title чиститься отдельно, теги моугт быть...
        $title = $term_title ?: esc_html($obj->post_title);
        $show_title = $term_title ? $arg->show_term_title : $arg->show_post_title;

        // пагинация
        if ($arg->pg_end) {
            $link = $term_title ? get_term_link($obj) : get_permalink($obj);
            $add_to .= ($add_to ? $arg->sep : '') . sprintf($arg->linkpatt, $link, $title) . $arg->pg_end;
        }
        // дополняем - ставим sep
        elseif ($add_to) {
            if ($show_title) {
                $add_to .= $arg->sep . sprintf($arg->title_patt, $title);
            } elseif ($arg->last_sep) {
                $add_to .= $arg->sep;
            }
        }
        // sep будет потом...
        elseif ($show_title) {
            $add_to = sprintf($arg->title_patt, $title);
        }

        return $add_to;
    }
}
// end  навигационная цепочка (хлебные крошки)


add_theme_support('title-tag');




// start Обработчик AJAX запроса для подгрузки отзывов
add_action('wp_ajax_load_more_reviews', 'load_more_reviews');
add_action('wp_ajax_nopriv_load_more_reviews', 'load_more_reviews');

function load_more_reviews()
{
    $page = $_POST['page'];

    $args = array(
        'post_type' => 'reviews',
        'posts_per_page' => 4,
        'paged' => $page,
    );
    $query = new WP_Query($args);
    $total_posts = $query->found_posts;

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
?>
            <div class="reviews-slider-item">
                <div class="reviews-slider-item-inner">

                    <h3><?php the_title() ?></h3>

                    <div class="reviews-slider-item-inner__body">
                        <div class="review-owner">
                            <div class="review-owner__top">
                                <cite><?php the_field('review_owner'); ?></cite>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="reviews-slider-item__pic">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <time datetime="<?php the_field('publication_date'); ?>"><?php the_field('publication_date'); ?></time>
                        </div>

                        <div class="reviews-slider-item__desc__wrap">


                            <div class="reviews-slider-item__desc">
                                <blockquote>
                                    <?php the_field('callback_text') ?>
                                </blockquote>
                            </div>

                            <div class="reviews-slider-item-btns">
                                <div class="reviews-slider-item-btns__item">
                                    <a href="<?php echo get_field('src_link') ?>" rel="nofollow" target="_blank" class="btn btn_min">
                                        источник
                                    </a>
                                </div>

                                <?php if ($project_link) { ?>
                                    <div class="reviews-slider-item-btns__item">
                                        <a href="<?php echo $project_link->guid ?>" rel="nofollow" class="btn btn_min">
                                            проект
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
<?php
        }
        wp_reset_postdata();
    } else {
        echo 'end'; // Отправим "end" как индикатор, что больше отзывов нет
    }

    wp_die();
}
// end Обработчик AJAX запроса для подгрузки отзывов