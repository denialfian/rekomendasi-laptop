<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Recomender System</title>

    <link href="<?= Config::get('url/base_url');?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= Config::get('url/base_url');?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= Config::get('url/base_url');?>assets/css/style_member.css" rel="stylesheet">

    <script src="<?= Config::get('url/base_url');?>assets/js/jquery.js"></script>
    <script src="<?= Config::get('url/base_url');?>assets/js/bootstrap.min.js"></script>

</head><!--/head-->

<body>


<div class="container">
    <header>
        <div class="page-header">
             <h1>SISTEM REKOMENDASI LAPTOP</h1>
             <h4>dengan content based dan collaborative filtering</h4>
        </div>
        <ol class="breadcrumb">
            <?php
                $not = [null,'webmaster','rec laptop'];
                $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
                foreach($crumbs as $crumb){
                    $url[$crumb] = ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
                    if ($crumb !== "webmaster" && $crumb !== "" && $crumb !== "rec_laptop") {
                        if ($crumb == "member") {
                            $hasil['home'] = Config::get('url/base_url')."member/";
                        }else{
                            $hasil[$crumb] = Config::get('url/base_url')."member/".str_replace(array(".php"),array(""," "),$crumb) . ' ';
                        }
                    }
                }

                foreach ($hasil as $title => $link) {
                   // echo '<li><a href="'.$link.'">'.ucwords($title).'</a></li>';
                }

                function breadcrumbs($text = '', $sep = ' &raquo; ', $home = 'Home') {
                    //Use RDFa breadcrumb, can also be used for microformats etc.
                    $bc     =   '<div xmlns:v="http://rdf.data-vocabulary.org/#" id="crums">'.$text;
                    //Get the website:
                    $site   =   Config::get('url/base_url');
                    //Get all vars en skip the empty ones
                    $crumbs =   array_filter( explode("/",$_SERVER["REQUEST_URI"]) );
                    //Create the home breadcrumb
                    $bc    .=   '<span typeof="v:Breadcrumb"><a href="'.$site.'" rel="v:url" property="v:title">'.$home.'</a>'.$sep.'</span>'; 
                    //Count all not empty breadcrumbs
                    $nm     =   count($crumbs);
                    $i      =   1;
                    //Loop the crumbs
                    foreach($crumbs as $crumb){
                        if ($crumb !== "webmaster" && $crumb !== "" && $crumb !== "rec_laptop") {
                            //Make the link look nice
                            $link    =  ucfirst( str_replace( array(".php","-","_"), array(""," "," ") ,$crumb) );
                            //Loose the last seperator
                            $sep     =  $i==$nm?'':$sep;
                            //Add crumbs to the root
                            $site   .=  '/'.$crumb;
                            //Make the next crumb
                            $bc     .=  '<span typeof="v:Breadcrumb"><a href="'.$site.'" rel="v:url" property="v:title">'.$link.'</a>'.$sep.'</span>';
                            $i++;
                        }
                    }
                    $bc .=  '</div>';
                    //Return the result
                    return $bc;
                }

                    echo breadcrumbs();
            ?>
        </ol>
    </header><!-- /header -->

    <div class="content">
        <div class="row">


            <div class="side-menu">


                <!-- MENU -->
                <div class="col-md-3">
                    <div class="menu">
                        <div class="list-group">
                            <a href="<?= Config::get('url/base_url');?>member" class="list-group-item">
                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home
                            </a>
                            <a href="<?= Config::get('url/base_url');?>member/profil_info" class="list-group-item">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Profile info
                            </a>
                            <a href="<?= Config::get('url/base_url');?>member/profil_likes" class="list-group-item">
                                <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>profile likes
                            </a>
                            <a href="<?= Config::get('url/base_url');?>member/get_recommendation" class="list-group-item">
                                <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>Perhitungan
                            </a>
                            <a href="<?= Config::get('url/base_url');?>user/logout" class="list-group-item">
                                <span class="fa fa-clipboard" aria-hidden="true"></span>Logout
                            </a>
                        </div>
                    </div>
                </div>
                <!-- MENU -->


          </div>