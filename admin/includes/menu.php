<ul id="menu">
    <?php
    $menu = array(

        array(
            'module' => 'admin',
            'title' => 'Admin',
            'submenu' =>
                array(
                    0 =>
                        array(
                            'action' => 'add',
                            'title' => 'Add',
                        ),
                    1 =>
                        array(
                            'action' => 'list',
                            'title' => 'Overview',
                        ),
                ),
        ),

        array(
            'module' => 'page',
            'title' => 'Page',
            'submenu' =>
                array(
                    0 =>
                        array(
                            'action' => 'form',
                            'title' => 'Add',
                        ),
                    1 =>
                        array(
                            'action' => 'list',
                            'title' => 'Overview',
                        ),
                ),
        ),
        array(
            'module' => 'news',
            'title' => 'News',
            'submenu' =>
                array(
                    0 =>
                        array(
                            'action' => 'form',
                            'title' => 'Add',
                        ),
                    1 =>
                        array(
                            'action' => 'list',
                            'title' => 'Overview',
                        ),
                ),
        ),
        array(
            'module' => 'slider',
            'title' => 'Slider',
            'submenu' =>
                array(
                    0 =>
                        array(
                            'action' => 'form',
                            'title' => 'Add',
                        ),
                    1 =>
                        array(
                            'action' => 'list',
                            'title' => 'Overview',
                        ),
                ),
        ),
        array(
            'module' => 'camps',
            'title' => 'Camps',
            'submenu' =>
                array(
                    0 =>
                        array(
                            'action' => 'form',
                            'title' => 'Add',
                        ),
                    1 =>
                        array(
                            'action' => 'list',
                            'title' => 'Overview',
                        ),
                    2 =>
                        array(
                            'action' => 'registrations',
                            'title' => 'Registrations',
                        ),
                ),
        ),
        array(
            'module' => 'site',
            'title' => 'Site data',
            'submenu' =>
                array(
                    0 =>
                        array(
                            'action' => 'form',
                            'title' => 'Add',
                        ),
                    1 =>
                        array(
                            'action' => 'list',
                            'title' => 'Overview',
                        ),
                ),
        ),
        array(
            'module' => 'settings',
            'title' => 'Settings',
            'submenu' =>
                array(
                    0 =>
                        array(
                            'action' => 'backup',
                            'title' => 'Backup',
                        ),
                    1 =>
                        array(
                            'action' => 'manage',
                            'title' => 'Manage',
                        ),
                    2 =>
                        array(
                            'action' => 'uploads',
                            'title' => 'Uploads',
                        ),
                ),
        ),
    );
    $_GET['module'] = isset($_GET['module']) ? $_GET['module'] : "admin";

    $_GET['action'] = isset($_GET['action']) ? $_GET['action'] : NULL;

    $selected_module = $_GET['module'];

    if (strpos($selected_module, '/') !== false) {
        $selected_module = substr($selected_module, 0, strpos($selected_module, '/'));
    }

    foreach ($menu as $module) { ?>
        <li <?php echo $selected_module == $module['module'] ? 'class="selected"' : ''; ?>>
            <a href="#" class="module"><?php echo $module['title']; ?></a>
            <ul class="actions">
                <?php foreach ($module['submenu'] as $item) { ?>
                    <li class="<?php printf('%s-%s %s', $module['module'], $item['action'], $item['action']); ?>">
                        <a <?php echo ($_GET['module'] == $module['module'] && $_GET['action'] == $item['action']) ? 'class="selected"' : ''; ?>
                            href="<?php printf('?module=%s&action=%s', $module['module'], $item['action']); ?>">
                            <?php echo $item['title']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
</ul>
