<?php
// router
if (!getRequest()) {
    foreach (scandir(TEMPLATES) as $view) {
        if (substr($view, 0, 1) !== '.') {
            $view = str_replace('.php', '', $view);
            echo '<a href="?view=' . $view . '">' . $view . '</a><br>';
        }
    }
} else {
    include(ROOT . '/views/layouts/standard.php');
}

function echoContent()
{
    if(file_exists(VIEWSCRIPTS . '/' . getRequest() . '.php')){
        include(VIEWSCRIPTS . '/' . getRequest() . '.php');
    }
    include(TEMPLATES . '/' . getRequest() . '.php');
}

function getRequest()
{
    if (isset($_GET['view'])) {
        return $_GET['view'];
    }
    return null;
}

function echoLayoutTop()
{
    include(ROOT . '/views/includes/layout-top.php');
}

function echoLayoutBottom()
{
    include(ROOT . '/views/includes/layout-bottom.php');
}