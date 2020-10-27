<?php
require_once "vendor/autoload.php"; // You have to require the library from your Composer vendor folder

$access_token = "TEST-8426002329782059-102723-9b17e3abf780c1c690cc6c5b26edcab3-664225366";
MercadoPago\SDK::setAccessToken($access_token); // Either Production or SandBox AccessToken

$url_base = "https://mrdemarchi-mp-ecommerce-php.herokuapp.com/";

$title = $_POST["title"];
$price = $_POST["price"];
$unit = $_POST["unit"];
$img = $_POST["img"];
$action = isset($_POST["action"])? $_POST["action"] : "";

$preference = new MercadoPago\Preference();

$item = [
    "id" => "1234",
    "title" => $_POST["title"],
    "description" => "Dispositivo móvil de Tienda e-commerce",
    "currency_id" => "ARS",
    "quantity" => (int) $_POST["unit"],
    "unit_price" => (float) $_POST["price"],
    "picture_url" => $url_base . str_replace("./", "", $_POST["img"])
];


$preference->items = [$item];
$preference->auto_return = "approved";
$preference->external_reference = "mrdemarchi@gmail.com";
$preference->notification_url = $url_base . "notification.php";
$preference->back_urls = [
    "failure" => $url_base . "failure.php",
    "pending" => $url_base . "pending.php",
    "success" => $url_base . "success.php"
];
$preference->payment_methods = [
    "excluded_payment_types" => [["id" => "atm"]],
    "excluded_payment_methods" => [["id" => "amex"]],
    "installments" => 6
];
$payer = new \MercadoPago\Payer();
$payer->name = "Lalo Landa";
$payer->emil = "test_user_93446800@testuser.com";
$payer->phone = ["area_code" => "11", "number" => "22223333"];
$payer->address = ["street_name" => "False", "street_number" => 123, "zip_code" => "1111"];
$preference->payer = $payer;

$preferenceSaved = $preference->save()

?>


<!DOCTYPE html>
<html class="supports-animation supports-columns svg no-touch no-ie no-oldie no-ios supports-backdrop-filter as-mouseuser"
      lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=1024">
    <title>Tienda e-commerce</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no">

    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./assets/category-landing.css" media="screen, print">

    <link rel="stylesheet" href="./assets/category.css" media="screen, print">

    <link rel="stylesheet" href="./assets/merch-tools.css" media="screen, print">

    <link rel="stylesheet" href="./assets/fonts" media="">
    <style>
        .as-filter-button-text {
            font-size: 26px;
            font-weight: 700;
            color: #333;
        }

        .row.as-fixed-nav {
            border-bottom: 1px solid #ddd;
        }

        .as-producttile-tilehero.with-paddlenav.with-paddlenav-onhover {
            height: 330px;
        }

        .as-footnotes {
            background: #333;
            color: #fff;
            padding: 16px 40px;
        }
    </style>
    <style type="text/css"> @keyframes loading-rotate {
                                100% {
                                    transform: rotate(360deg);
                                }
                            }

        @keyframes loading-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }
            50% {
                stroke-dasharray: 100, 200;
                stroke-dashoffset: -20px;
            }
            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124px;
            }
        }

        @keyframes loading-fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .mp-spinner {
            position: absolute;
            top: 100px;
            left: 50%;
            font-size: 70px;
            margin-left: -35px;
            animation: loading-rotate 2.5s linear infinite;
            transform-origin: center center;
            width: 1em;
            height: 1em;
        }

        .mp-spinner-path {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
            animation: loading-dash 1.5s ease-in-out infinite;
            stroke-linecap: round;
            stroke-width: 2px;
            stroke: #009ee3;
        } </style>
    <style type="text/css"> .mercadopago-button {
            padding: 0 1.7142857142857142em;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875em;
            line-height: 2.7142857142857144;
            background: #009ee3;
            border-radius: 0.2857142857142857em;
            color: #fff;
            cursor: pointer;
            border: 0;
        } </style>
    <style type="text/css"> @keyframes loading-rotate {
                                100% {
                                    transform: rotate(360deg);
                                }
                            }

        @keyframes loading-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }
            50% {
                stroke-dasharray: 100, 200;
                stroke-dashoffset: -20px;
            }
            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124px;
            }
        }

        @keyframes loading-fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .mp-spinner {
            position: absolute;
            top: 100px;
            left: 50%;
            font-size: 70px;
            margin-left: -35px;
            animation: loading-rotate 2.5s linear infinite;
            transform-origin: center center;
            width: 1em;
            height: 1em;
        }

        .mp-spinner-path {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
            animation: loading-dash 1.5s ease-in-out infinite;
            stroke-linecap: round;
            stroke-width: 2px;
            stroke: #009ee3;
        } </style>
    <style type="text/css"> .mercadopago-button {
            padding: 0 1.7142857142857142em;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875em;
            line-height: 2.7142857142857144;
            background: #009ee3;
            border-radius: 0.2857142857142857em;
            color: #fff;
            cursor: pointer;
            border: 0;
        } </style>
    <style type="text/css"> @keyframes loading-rotate {
                                100% {
                                    transform: rotate(360deg);
                                }
                            }

        @keyframes loading-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }
            50% {
                stroke-dasharray: 100, 200;
                stroke-dashoffset: -20px;
            }
            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124px;
            }
        }

        @keyframes loading-fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .mp-spinner {
            position: absolute;
            top: 100px;
            left: 50%;
            font-size: 70px;
            margin-left: -35px;
            animation: loading-rotate 2.5s linear infinite;
            transform-origin: center center;
            width: 1em;
            height: 1em;
        }

        .mp-spinner-path {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
            animation: loading-dash 1.5s ease-in-out infinite;
            stroke-linecap: round;
            stroke-width: 2px;
            stroke: #009ee3;
        } </style>
    <style type="text/css"> .mercadopago-button {
            padding: 0 1.7142857142857142em;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875em;
            line-height: 2.7142857142857144;
            background: #009ee3;
            border-radius: 0.2857142857142857em;
            color: #fff;
            cursor: pointer;
            border: 0;
        } </style>
    <style type="text/css"> @keyframes loading-rotate {
                                100% {
                                    transform: rotate(360deg);
                                }
                            }

        @keyframes loading-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }
            50% {
                stroke-dasharray: 100, 200;
                stroke-dashoffset: -20px;
            }
            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124px;
            }
        }

        @keyframes loading-fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .mp-spinner {
            position: absolute;
            top: 100px;
            left: 50%;
            font-size: 70px;
            margin-left: -35px;
            animation: loading-rotate 2.5s linear infinite;
            transform-origin: center center;
            width: 1em;
            height: 1em;
        }

        .mp-spinner-path {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
            animation: loading-dash 1.5s ease-in-out infinite;
            stroke-linecap: round;
            stroke-width: 2px;
            stroke: #009ee3;
        } </style>
    <style type="text/css"> .mercadopago-button {
            padding: 0 1.7142857142857142em;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875em;
            line-height: 2.7142857142857144;
            background: #009ee3;
            border-radius: 0.2857142857142857em;
            color: #fff;
            cursor: pointer;
            border: 0;
        } </style>
    <style type="text/css"> @keyframes loading-rotate {
                                100% {
                                    transform: rotate(360deg);
                                }
                            }

        @keyframes loading-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }
            50% {
                stroke-dasharray: 100, 200;
                stroke-dashoffset: -20px;
            }
            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124px;
            }
        }

        @keyframes loading-fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .mp-spinner {
            position: absolute;
            top: 100px;
            left: 50%;
            font-size: 70px;
            margin-left: -35px;
            animation: loading-rotate 2.5s linear infinite;
            transform-origin: center center;
            width: 1em;
            height: 1em;
        }

        .mp-spinner-path {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
            animation: loading-dash 1.5s ease-in-out infinite;
            stroke-linecap: round;
            stroke-width: 2px;
            stroke: #009ee3;
        } </style>
    <style type="text/css"> .mercadopago-button {
            padding: 0 1.7142857142857142em;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875em;
            line-height: 2.7142857142857144;
            background: #009ee3;
            border-radius: 0.2857142857142857em;
            color: #fff;
            cursor: pointer;
            border: 0;
        } </style>
    <style type="text/css"> @keyframes loading-rotate {
                                100% {
                                    transform: rotate(360deg);
                                }
                            }

        @keyframes loading-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }
            50% {
                stroke-dasharray: 100, 200;
                stroke-dashoffset: -20px;
            }
            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124px;
            }
        }

        @keyframes loading-fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .mp-spinner {
            position: absolute;
            top: 100px;
            left: 50%;
            font-size: 70px;
            margin-left: -35px;
            animation: loading-rotate 2.5s linear infinite;
            transform-origin: center center;
            width: 1em;
            height: 1em;
        }

        .mp-spinner-path {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
            animation: loading-dash 1.5s ease-in-out infinite;
            stroke-linecap: round;
            stroke-width: 2px;
            stroke: #009ee3;
        } </style>
    <style type="text/css"> .mercadopago-button {
            padding: 0 1.7142857142857142em;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875em;
            line-height: 2.7142857142857144;
            background: #009ee3;
            border-radius: 0.2857142857142857em;
            color: #fff;
            cursor: pointer;
            border: 0;
        } </style>
    <script src="https://www.mercadopago.com/v2/security.js" view="item"></script>
</head>


<body class="as-theme-light-heroimage">

<div class="stack">

    <div class="as-search-wrapper" role="main">
        <div class="as-navtuck-wrapper">
            <div class="as-l-fullwidth  as-navtuck" data-events="event52">
                <div>
                    <div class="pd-billboard pd-category-header">
                        <div class="pd-l-plate-scale">
                            <div class="pd-billboard-background">
                                <img src="./assets/music-audio-alp-201709" alt="" width="1440" height="320"
                                     data-scale-params-2="wid=2880&amp;hei=640&amp;fmt=jpeg&amp;qlt=95&amp;op_usm=0.5,0.5&amp;.v=1503948581306"
                                     class="pd-billboard-hero ir">
                            </div>
                            <div class="pd-billboard-info">
                                <h1 class="pd-billboard-header pd-util-compact-small-18">Tienda e-commerce</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="as-search-results as-filter-open as-category-landing as-desktop" id="as-search-results">

            <div id="accessories-tab" class="as-accessories-details">
                <div class="as-accessories" id="as-accessories">
                    <div class="as-accessories-header">
                        <div class="as-search-results-count">
                            <span class="as-search-results-value"></span>
                        </div>
                    </div>
                    <div class="as-searchnav-placeholder" style="height: 77px;">
                        <div class="row as-search-navbar" id="as-search-navbar" style="width: auto;">
                            <div class="as-accessories-filter-tile column large-6 small-3">

                                <button class="as-filter-button" aria-expanded="true" aria-controls="as-search-filters"
                                        type="button">
                                    <h2 class=" as-filter-button-text">
                                        Smartphones
                                    </h2>
                                </button>

                            </div>

                        </div>
                    </div>
                    <div class="mercadopago-button" style="background: darkred; margin: 5px;">
                        <?PHP print_r($preference->error) ?>
                    </div>
                    <div class="as-accessories-results  as-search-desktop">
                        <div class="width:60%">
                            <div class="as-producttile-tilehero with-paddlenav " style="float:left;">
                                <div class="as-dummy-container as-dummy-img">

                                    <img src="./assets/wireless-headphones"
                                         class="ir ir item-image as-producttile-image  "
                                         style="max-width: 70%;max-height: 70%;" alt="" width="445" height="445">
                                </div>
                                <div class="images mini-gallery gal5 ">


                                    <div class="as-isdesktop with-paddlenav with-paddlenav-onhover">
                                        <div class="clearfix image-list xs-no-js as-util-relatedlink relatedlink"
                                             data-relatedlink="6|Powerbeats3 Wireless Earphones - Neighborhood Collection - Brick Red|MPXP2">
                                            <div class="as-tilegallery-element as-image-selected">
                                                <div class=""></div>
                                                <img src="./assets/003.jpg"
                                                     class="ir ir item-image as-producttile-image" alt="" width="445"
                                                     height="445"
                                                     style="content:-webkit-image-set(url(<?php echo $img ?>) 2x);">
                                            </div>

                                        </div>


                                    </div>


                                </div>

                            </div>
                            <div class="as-producttile-info" style="float:left;min-height: 168px;">
                                <div class="as-producttile-titlepricewraper" style="min-height: 128px;">
                                    <div class="as-producttile-title">
                                        <h3 class="as-producttile-name">
                                            <p class="as-producttile-tilelink">
                                                <span data-ase-truncate="2"><?php echo $title ?></span>
                                            </p>

                                        </h3>
                                    </div>
                                    <h3>
                                        <?php echo $price ?>
                                    </h3>
                                    <h3>
                                        <?php echo "$" . $unit ?>
                                    </h3>
                                </div>
                                <script
                                        src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                                        data-preference-id="<?php echo $preference->id; ?>">
                                </script>
                                <a type="submit" class="mercadopago-button" style="padding: 12px" href="<?PHP echo $preference->init_point ?>">Pagar la compra con redirect</a>
<!--                                <form method="post">-->
<!--                                    <input type="hidden" name="title" value="--><?PHP //echo $title ?><!--">-->
<!--                                    <input type="hidden" name="price" value="--><?PHP //echo $price ?><!--">-->
<!--                                    <input type="hidden" name="unit" value="--><?PHP //echo $unit ?><!--">-->
<!--                                    <input type="hidden" name="img" value="--><?PHP //echo $img ?><!--">-->
<!--                                    <input type="hidden" name="action" value="redirect">-->
<!--                                    <button type="submit" class="mercadopago-button">Pagar</button>-->
<!--                                </form>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="alert" class="as-loader-text ally" aria-live="assertive"></div>
    <div class="as-footnotes">
        <div class="as-footnotes-content">
            <div class="as-footnotes-sosumi">
                Todos los derechos reservados Tienda Tecno 2019
            </div>
        </div>
    </div>

</div>
<div class="mp-mercadopago-checkout-wrapper"
     style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;">
    <svg class="mp-spinner" viewBox="25 25 50 50">
        <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle>
    </svg>
</div>
<div class="mp-mercadopago-checkout-wrapper"
     style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;">
    <svg class="mp-spinner" viewBox="25 25 50 50">
        <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle>
    </svg>
</div>
<div class="mp-mercadopago-checkout-wrapper"
     style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;">
    <svg class="mp-spinner" viewBox="25 25 50 50">
        <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle>
    </svg>
</div>
<div class="mp-mercadopago-checkout-wrapper"
     style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;">
    <svg class="mp-spinner" viewBox="25 25 50 50">
        <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle>
    </svg>
</div>
<div class="mp-mercadopago-checkout-wrapper"
     style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;">
    <svg class="mp-spinner" viewBox="25 25 50 50">
        <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle>
    </svg>
</div>
<div class="mp-mercadopago-checkout-wrapper"
     style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;">
    <svg class="mp-spinner" viewBox="25 25 50 50">
        <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle>
    </svg>
</div>
<div id="ac-gn-viewport-emitter"></div>
</body>
</html>