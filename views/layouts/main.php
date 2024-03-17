<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);


$navLinks = [
    ['label' => '<p style="margin-bottom: 0px;">студенты</p>', 'url' => ['/teacher']],
    ['label' => '<p style="margin-bottom: 0px;">добавление студента</p>', 'url' => ['/teacher/student/create']],
    ['label' => '<p style="margin-bottom: 0px;">группы</p>', 'url' => ['/teacher/group']],
    ['label' => '<p style="margin-bottom: 0px;">тесты</p>', 'url' => ['/teacher/create-test']],
];

//предлагаю раскидывать кнопки способом ниже

// if (Yii::$app->user->isGuest) {
//     $navLinks = [
//         ['label' => 'войти', 'url' => ['/site/login']]
//     ];
// } elseif (Yii::$app->user->identity->role_id == Role::getRoleId('manager')) {
//     $navLinks = [
//         ['label' => '<i class="nav-icon fi fi-rr-user"></i> <p>преподаватели</p>', 'url' => ['/manager']],
//         ['label' => '<i class="nav-icon fi fi-rr-user-add"></i> <p>добавление преподавателя</p>', 'url' => ['/manager/teacher/create']],
//         ['label' => '<i class="nav-icon fi-rr-users-alt"></i> <p>группы</p>', 'url' => ['/manager/group']],
//     ];
// } elseif (Yii::$app->user->identity->role_id == Role::getRoleId('teacher')) {
//     $navLinks = [
//         ['label' => '<i class="nav-icon fi fi-rr-user"></i> <p>студенты</p>', 'url' => ['/teacher']],
//         ['label' => ' <i class="nav-icon fi fi-rr-user-add"></i> <p>добавление студента</p>', 'url' => ['/teacher/student/create']],
//         ['label' => '<i class="nav-icon fi-rr-users-alt"></i> <p>группы</p>', 'url' => ['/teacher/group']],
//         ['label' => '<i class="nav-icon fi fi-rr-document"></i>  <p>тесты</p>', 'url' => ['/teacher/create-test']],
//     ];
// } elseif (Yii::$app->user->identity->role_id == Role::getRoleId('student')) {
//     $navLinks = [
//         ['label' => '<i class="nav-icon fi-rr-users-alt"></i> <p>личный кабинет</p>', 'url' => ['/student']],
//     ];
// }

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<link rel="https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
<link rel="apple-touch-icon" sizes="76x76" href="../../web/material-dashboard-master/assets/img/apple-icon.png" />
<link rel="icon" type="image/png" href="../../web/material-dashboard-master/assets/img/favicon.png" />

<title>Material Dashboard 2 by Creative Tim</title>

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

<!-- Nucleo Icons -->
<link href="../../web/material-dashboard-master/assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../../web/material-dashboard-master/assets/css/nucleo-svg.css" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />

<!-- CSS Files -->

<link id="pagestyle" href="../../web/material-dashboard-master/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />

<!-- Nepcha Analytics (nepcha.com) -->
<!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
<!-- <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script> -->
</head>

<body class="g-sidenav-show bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                <img src="../../web/material-dashboard-master/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo" />
                <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
            </a>
        </div>

        <hr class="horizontal light mt-0 mb-2" />

        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <?php
                $getNavLinks = function ($navLinks) {
                    $string = '';
                    if (!is_null($navLinks)) {
                        # code...
                        foreach ($navLinks as $value) {
                            $string .=  "<li class='nav-item'>
                                    <a class='nav-link text-white' href=" . $value['url'][0] . ">" . "<div class='text-white text-center me-2 d-flex align-items-center justify-content-center'>" . $value['label'] . "</div></a>
                                    </li>";
                        }
                    }
                    return $string;
                };
                ?>
                <?= $getNavLinks($navLinks) ?>
            </ul>
        </div>

    </aside>

    <main class="main-content border-radius-lg">
        <!-- Navbar -->

        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                            index
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">index</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <!-- //header -->
                </div>
            </div>
        </nav>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <?= $content ?>
        </div>
    </main>


    <!--   Core JS Files   -->
    <script src="../../web/material-dashboard-master/assets/js/core/popper.min.js"></script>
    <script src="../../web/material-dashboard-master/assets/js/core/bootstrap.min.js"></script>
    <script src="../../web/material-dashboard-master/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../web/material-dashboard-master/assets/js/plugins/smooth-scrollbar.min.js"></script>

    <script>
        var win = navigator.platform.indexOf("Win") > -1;
        if (win && document.querySelector("#sidenav-scrollbar")) {
            var options = {
                damping: "0.5",
            };
            Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
        }
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../web/material-dashboard-master/assets/js/material-dashboard.min.js?v=3.1.0"></script>

</html>
<?php $this->endPage() ?>