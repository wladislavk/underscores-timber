<?php
/**
 * Created by PhpStorm.
 * User: vkr
 * Date: 2/4/2558
 * Time: 18:45
 */


// This data should be contained in XML or JSON file in a production environment. Here it's just a sample to
// show how you set arrays to be passed over to templates.
function set_front_page_items() {
    $items = array(
        'links' => array(
            'cis' => array(
                'russia' => 'Центральная Россия',
                'transsib' => 'Транссиб',
                'sever' => 'Русский Север',
                'ural' => 'Урал',
                'ukraine' => 'Украина и Молдавия',
                'belarus' => 'Белоруссия',
                'srasia' => 'Средняя Азия',
                'uzbek' => 'Узбекистан',
                'taj' => 'Таджикистан',
            ),
            'europe' => array(
                'baltic' => 'Прибалтика',
                'bulgaria' => 'Болгария',
                'poland' => 'Польша',
            ),
            'asia' => array(
                'thailand' => 'Таиланд',
                'israel' => 'Израиль и Палестина',
                'indonesia' => 'Индонезия',
                'srilanka' => 'Шри-Ланка',
                'papua' => 'Новая Гвинея',
            ),
            'africa' => array(
                'egypt' => 'Египет',
                'eastafrica' => 'Восточная Африка',
                'madagascar' => 'Мадагаскар',
            ),
        ),
        'regions' => array(
            'cis' => 'Россия и СНГ',
            'europe' => 'Европа',
            'asia' => 'Азия',
            'africa' => 'Африка',
        ),
    );
    return $items;
}