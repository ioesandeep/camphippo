<?php
function menu($header = true)
{
    $menus = table_fetch_rows('page', 'top_nav = 1 and status=1','position asc');
    if (false != $menus) {
        __('ul', false, 'nav navbar-nav');
        foreach ($menus as $menu) {
            $rewrite = getRewriteUrl('page', $menu['id']);
            $class = $GLOBALS['url'] == $rewrite ? 'active' : false;
            __('li', false, $class);
            __('a', false, false, array('href' => $rewrite));
            _e($menu['menu_title']);
            __('/a');
            __('/li');
        }
        __('/ul');
    }
}