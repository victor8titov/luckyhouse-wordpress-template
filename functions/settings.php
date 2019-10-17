<?php
require_once LH_FUN . '/custom_post_type.php';



/**
 * 
 * 
 *      Функция для конфигирироваиня нового типа постов!
 * 
 *      Представлен шаблон
 * 
 */


function ele_get_post_types() {

	return array(
        // Шаблон
        
        'why_we_best' => array(
            'singular' => 'Why we are the best',   // название для одной записи этого типа   
            'multiple' => 'Why we are the best',  // основное название для типа записи         
            
            'config' => array(
                // все параметры в сноске *
                'public' => true,
                'menu_position' => 20,
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
					//'excerpt',
                    //'comments',
                    'custom-field',
                ),
                'show_in_nav_menus'=> true,
            ),
        ),
        'group_of_companies' => array(
            'singular' => 'Group of companies Lucky House',   // название для одной записи этого типа   
            'multiple' => 'Group of companies Lucky House',  // основное название для типа записи         
            
            'config' => array(
                // все параметры в сноске *
                'public' => true,
                'menu_position' => 20,
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
					//'excerpt',
                    //'comments',
                    'custom-field',
                ),
                'show_in_nav_menus'=> true,
            ),
        ),
        'history' => array(
            'singular' => 'History',   // название для одной записи этого типа   
            'multiple' => 'History',  // основное название для типа записи         
            
            'config' => array(
                // все параметры в сноске *
                'public' => true,
                'menu_position' => 20,
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
					//'excerpt',
                    //'comments',
                    'custom-field',
                ),
                'show_in_nav_menus'=> true,
            ),
        ),           
    );
}


/*
*-------------------------------------------------------------------------
*   Сноска:
*-------------------------------------------------------------------------
* https://wp-kama.ru/function/register_post_type#label-stroka
*
*   Name custom post type
___________________________ 
watermalon : Названия типа поста, нельзя использовать следующие названия 
            post
            page
            attachment
            revision
            nav_menu_item
            custom_css
            customize_changeset
            action
            author
            order
            theme
*
* Все доступные параметры для custom post type
*______________________________________________
'label'               => null, // Имя типа записи помеченное для перевода на другой язык.
'description'         => '', // Короткое описание этого типа записи. Значение используется в REST API.
'public'              => true, // Определяет является ли тип записи публичным или нет. 
'publicly_queryable'  => null, // зависит от public
'exclude_from_search' => null, // Исключить ли этот тип записей из поиска по сайту. 1 (true) - да, 0 (false) - нет.
'show_ui'             => null, // Определяет нужно ли создавать логику управления типом записи из админ-панели. 
'show_in_menu'        => null, // показывать ли в меню адмнки
'show_in_admin_bar'   => null, // Сделать этот тип доступным из админ бара.
'show_in_nav_menus'   => null, // Включить возможность выбирать этот тип записи в меню навигации.
'show_in_rest'        => null, // добавить в REST API. C WP 4.7
'rest_base'           => null, // $post_type. C WP 4.7
'menu_position'       => null, // Позиция где должно расположится меню нового типа записи: 1-100
'menu_icon'           => null, // Ссылка на картинку, которая будет использоваться для этого меню.
//'capability_type'   => 'post',
//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
'hierarchical'        => false, //Будут ли записи этого типа иметь древовидную структуру (как постоянные страницы).
'supports'            => array('title','editor'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
'taxonomies'          => array(), //Массив зарегистрированных таксономий, которые будут связанны с этим типом записей, например
'has_archive'         => false, // Включить поддержку страниц архивов для этого типа записей
'rewrite'             => true, //Использовать ли ЧПУ для этого типа записи. 
'query_var'           => true,
*
*/






/* 
    *******************

    Meta box

    ******************

*/

add_filter( 'rwmb_meta_boxes', 'prefix_register_meta_boxes' );

function prefix_register_meta_boxes( $meta_boxes ) {

    $prefix = 'lh_';

/*
    *------------------------------------------------------------------------------------------
    *                   МЕТАДАННЫЕ ДЛЯ ГЛАВНОЙ СТРАНИЦЫ
    *                   meta data for page-home.php
    *-------------------------------------------------------------------------------------------
*/    
    //  ищем номер поста в GET and POST переменных
    // Get the current ID
    if( isset( $_GET['post'] ) ) $post_id = $_GET['post'];    
    elseif( isset( $_POST['post_ID'] ) ) $post_id = $_POST['post_ID'];        
    
    // Get current template
    //  Пользуемся скрытыми метополями вордпресс
    //  для каждой страницы шаблона есть метаполе с именем шаблона
    //  скрыетое метополе _wp_page_template
    if ($post_id) $current_template = get_post_meta( $post_id, '_wp_page_template', true );
    else $current_template = '';
    
    //  проверяем если шаблон совпадает
    if( $current_template  === "page-home.php" ) {
    
        $meta_boxes[] = array(
            'id'            => $prefix . 'home_settings',
            'title'         => ' Настройки для Главной страницы',
            'post_types'    => array( 'page' ),
            'context'       => 'form_top',
            'priority'      => 'high',
            'autosave'      => 'false',
            'fields'        => array(
                /*  --- Главный экран настройки ---  */
                array(
                    'type' => 'heading',
                    'name' => 'Главный экран настройки',
                    //'desc' => 'Настройки блока',
                ),
                array(
                    'name'        => 'Бренд в меню',
                    //'label_description' => 'Label description',
                    'id'          => $prefix . 'main_brand',
                    'type'        => 'text',
                    // Placeholder
                    'placeholder' => 'Введите интро главного экрана',
                    'size'        => 100,
                ),
                array(
                    'name'        => 'Интро',
                    //'label_description' => 'Label description',
                    'id'          => $prefix . 'main_intro',
                    'type'        => 'text',
                    // Placeholder
                    'placeholder' => 'Введите интро главного экрана',
                    'size'        => 100,
                ),
                array(
                    'name'        => 'Главный текст',
                    //'label_description' => 'Label description',
                    'id'          => $prefix . 'main_heading',
                    'type'        => 'text',
                    // Placeholder
                    'placeholder' => 'Введите главный текст экрана',
                    'size'        => 100,
                ),
                /* Картинка главного экрана */
                array(
                    'name'             => 'Изображение главного экрана',
                    'id'               => $prefix .'main_foto',
                    'type'             => 'image_advanced',
                
                    // удалять картинку из медиатеки при удалении из метаполя?
                    // 'force_delete'     => true,
                
                    'max_file_uploads' => 1, // макс. кол-во файлов
                ),


                /*      --- Why we are the best ---      */
                array(
                    'type' => 'heading',
                    'name' => 'Блок Why we are the best',
                    'desc' => 'Настройки блока',
                ),
                
                array(
                    'id'        => $prefix . 'whyBest_show',
                    'name'      => 'Показывать/Скрывать',
                    //'label_description' => 'Небольшой текст отображается вместе с изображениме на слайде.',
                    'type'      => 'switch',                
                    // Стиль: rounded (по умолчанию) или square
                    'style'     => 'rounded',
                    'on_label'  => 'Показывать',
                    'off_label' => 'Скрывать',
                ),
                array(
                    'name'        => 'Залоговок блока',
                    //'label_description' => 'Label description',
                    'id'          => $prefix . 'whyBest_heading',
                    'type'        => 'text',
                    // Placeholder
                    'placeholder' => 'Введите загловок блока',
                    'size'        => 100,
                ),
                array(
                    'name'        => 'Подзаголовок блока',
                    //'label_description' => 'Label description',
                    'id'          => $prefix . 'whyBest_subtitle',
                    'type'        => 'text',
                    // Placeholder
                    'placeholder' => 'Введите подзагловок блока',
                    'size'        => 100,
                ),
                

                /*      --- Group of companies Lucky House ---      */
                array(
                    'type' => 'heading',
                    'name' => 'Блок Group of companies Lucky House ',
                    'desc' => 'Настройки блока',
                ),
                
                array(
                    'id'        => $prefix . 'groupCompaines_show',
                    'name'      => 'Показывать/Скрывать',
                    //'label_description' => 'Небольшой текст отображается вместе с изображениме на слайде.',
                    'type'      => 'switch',                
                    // Стиль: rounded (по умолчанию) или square
                    'style'     => 'rounded',
                    'on_label'  => 'Показывать',
                    'off_label' => 'Скрывать',
                ),
                array(
                    'name'        => 'Залоговок блока',
                    //'label_description' => 'Label description',
                    'id'          => $prefix . 'groupCompaines_heading',
                    'type'        => 'text',
                    // Placeholder
                    'placeholder' => 'Введите загловок блока',
                    'size'        => 100,
                ),
                array(
                    'name'        => 'Подзаголовок блока',
                    //'label_description' => 'Label description',
                    'id'          => $prefix . 'groupCompaines_subtitle',
                    'type'        => 'text',
                    // Placeholder
                    'placeholder' => 'Введите подзагловок блока',
                    'size'        => 100,
                ),

                /*      --- history ---      */
                array(
                    'type' => 'heading',
                    'name' => 'Блок History',
                    'desc' => 'Настройки блока',
                ),
                
                array(
                    'id'        => $prefix . 'history_show',
                    'name'      => 'Показывать/Скрывать',
                    //'label_description' => 'Небольшой текст отображается вместе с изображениме на слайде.',
                    'type'      => 'switch',                
                    // Стиль: rounded (по умолчанию) или square
                    'style'     => 'rounded',
                    'on_label'  => 'Показывать',
                    'off_label' => 'Скрывать',
                ),
                array(
                    'name'        => 'Залоговок блока',
                    //'label_description' => 'Label description',
                    'id'          => $prefix . 'history_heading',
                    'type'        => 'text',
                    // Placeholder
                    'placeholder' => 'Введите загловок блока',
                    'size'        => 100,
                ),
                array(
                    'name'        => 'Подзаголовок блока',
                    //'label_description' => 'Label description',
                    'id'          => $prefix . 'history_subtitle',
                    'type'        => 'text',
                    // Placeholder
                    'placeholder' => 'Введите подзагловок блока',
                    'size'        => 100,
                ),

                /*      --- Reference ---    */
                array(
                    'type' => 'heading',
                    'name' => 'Блок References',
                    'desc' => 'Настройки блока',
                ),
                
                array(
                    'id'        => $prefix . 'references_show',
                    'name'      => 'Показывать/Скрывать',
                    //'label_description' => 'Небольшой текст отображается вместе с изображениме на слайде.',
                    'type'      => 'switch',                
                    // Стиль: rounded (по умолчанию) или square
                    'style'     => 'rounded',
                    'on_label'  => 'Показывать',
                    'off_label' => 'Скрывать',
                ),
                /*      --- Partners ---    */
                array(
                    'type' => 'heading',
                    'name' => 'Блок Partners',
                    'desc' => 'Настройки блока',
                ),
                array(
                    'id'        => $prefix . 'partners_show',
                    'name'      => 'Показывать/Скрывать',
                    //'label_description' => 'Небольшой текст отображается вместе с изображениме на слайде.',
                    'type'      => 'switch',                
                    // Стиль: rounded (по умолчанию) или square
                    'style'     => 'rounded',
                    'on_label'  => 'Показывать',
                    'off_label' => 'Скрывать',
                ),
                array(
                    'name'        => 'Залоговок блока',
                    //'label_description' => 'Label description',
                    'id'          => $prefix . 'partners_heading',
                    'type'        => 'text',
                    // Placeholder
                    'placeholder' => 'Введите загловок блока',
                    'size'        => 100,
                ),
                array(
                    'name'        => 'Подзаголовок блока',
                    //'label_description' => 'Label description',
                    'id'          => $prefix . 'partners_subtitle',
                    'type'        => 'text',
                    // Placeholder
                    'placeholder' => 'Введите подзагловок блока',
                    'size'        => 100,
                ),
                array(
                    'name'        => 'Описание в подвале блока',
                    //'label_description' => 'Label description',
                    'id'          => $prefix . 'partners_text',
                    'type'        => 'textarea',
                    // Placeholder
                    'placeholder' => 'Введите текст блока',
                    
                ),
                
                

                /*      --- form ---     */
                array(
                    'type' => 'heading',
                    'name' => 'Блок Форма обратной связи',
                    'desc' => 'Настройки блока',
                ),
                
                array(
                    'id'        => $prefix . 'form_show',
                    'name'      => 'Показывать/Скрывать',
                    //'label_description' => 'Небольшой текст отображается вместе с изображениме на слайде.',
                    'type'      => 'switch',                
                    // Стиль: rounded (по умолчанию) или square
                    'style'     => 'rounded',
                    'on_label'  => 'Показывать',
                    'off_label' => 'Скрывать',
                ),
                /*      --- social ---     */
                array(
                    'type' => 'heading',
                    'name' => 'Ссылки на соц сети',
                    'desc' => 'Настройки блока',
                ),
                array(
                    'name'        => 'Instagram',
                    //'label_description' => 'Instagram',
                    'id'          =>  $prefix .'instagram',
                    //'desc'        => 'Please enter some text above',
                    'type'        => 'text',
                    // Placeholder
                    'placeholder' => 'Вставьте ссылку',
                ),
                array(
                    'name'        => 'Vkontakte',
                    //'label_description' => 'Instagram',
                    'id'          =>  $prefix .'vk',
                    //'desc'        => 'Please enter some text above',
                    'type'        => 'text',
                    // Placeholder
                    'placeholder' => 'Вставьте ссылку',
                ),
                array(
                    'name'        => 'Facebook',
                    //'label_description' => 'Instagram',
                    'id'          =>  $prefix .'facebook',
                    //'desc'        => 'Please enter some text above',
                    'type'        => 'text',
                    // Placeholder
                    'placeholder' => 'Вставьте ссылку',
                ),
            ),

        );
    }// end if for page-home.php	
    
    /* 
        meta for custom post type GROUP
     */
    $meta_boxes[] = array(
        'id'            => $prefix . 'group_settings',
        'title'         => ' Настройки для Group of companies',
        'post_types'    => array( 'group_of_companies' ),
        'context'       => 'form_top',
        'priority'      => 'high',
        'autosave'      => 'false',
        'fields'        => array(
            /*      ---  ---      */
            array(
                'type' => 'heading',
                'name' => 'Блок Why we are the best',
                'desc' => 'Настройки блока',
            ),
            array(
                'name'        => 'Подзаголовок в карточки группы',
                //'label_description' => 'Instagram',
                'id'          =>  $prefix .'group_subtitle_card',
                //'desc'        => 'Please enter some text above',
                'type'        => 'text',
                // Placeholder
                'placeholder' => 'Подзаголовок карточки',
                'size'        => 50,
            ),
            array(
                'name'        => 'Подзаголовок в основной статьи',
                //'label_description' => 'Instagram',
                'id'          =>  $prefix .'group_subtitle_article',
                //'desc'        => 'Please enter some text above',
                'type'        => 'text',
                // Placeholder
                'placeholder' => 'Подзаголовок полной статьи',
                'size'        => 50,
            ),
        )
    );
    /* 
        meta for custom post type GROUP
     */
    $meta_boxes[] = array(
        'id'            => $prefix . 'history_settings',
        'title'         => 'History',
        'post_types'    => array( 'history' ),
        'context'       => 'form_top',
        'priority'      => 'high',
        'autosave'      => 'false',
        'fields'        => array(
            /*      ---  ---      */
            array(
                'type' => 'heading',
                'name' => 'Блок History',
                'desc' => 'Настройки блока',
            ),
            array(
                'name'        => 'Подзагаловок для указания времени события',
                'id'          =>  $prefix .'history_time',
                //'desc'        => 'Please enter some text above',
                'type'        => 'text',
                // Placeholder
                'placeholder' => 'Когда произошло событие',
                'size'        => 50,
            ),
            array(
                'name' => 'Позиция в ленте истории',
                'id'   => $prefix .'history_position',
                'type' => 'number',
            ),
            
            
        )
    );



    

    return $meta_boxes;
}
    


?>