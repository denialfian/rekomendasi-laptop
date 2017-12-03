<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Profil - Rating</title>

    <link href="<?= Config::get('url/base_url');?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= Config::get('url/base_url');?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= Config::get('url/base_url');?>assets/css/style_member.css" rel="stylesheet">

    <script src="<?= Config::get('url/base_url');?>assets/js/jquery.js"></script>
    <script src="<?= Config::get('url/base_url');?>assets/js/bootstrap.min.js"></script>

</head><!--/head-->
<style type="text/css" media="screen">
.star{
        color: #f1c40f;
        
}
.star:hover, .star-no:hover{
    color: #f1c40f;
}
.star-no{
        color: #555;
      
}
.fa{
    margin-right: 10px;
}
</style>
<body>
    <div class="container">
        <div class="row">
        <h1>please rate minimal 2 laptop : </h1>
<?php
    $no = 0;
    $stop = 6;
    foreach ($data['produk'] as $laptop) {
?>

    <div class="col-md-3"`>
        <div class="top-col-in produk">
            <a href="#">
                <img src="<?= Config::get('url/base_url');?>upload/laptop/<?=$laptop->gambar;?>"  alt="" class="img-responsive">
            </a>
            <div class="col-grid">
                <div class="judul-warp">
                    <div class="judul-inner">
                        <h2><?=$laptop->name;?></h2>
                    </div>
                </div>
                
                <div class="lists">
                    <ul class="list-unstyled list-spec">
                        <li>
                            <div class="list-spec-inner">
                                <span class="fa fa-user"></span>
                                <span>Brand : <?=$laptop->brand;?></span>
                            </div>
                        </li>
                        <li>
                            <div class="list-spec-inner">
                                <span class="fa fa-globe"></span>
                                <span>RAM : <?=$laptop->ram;?></span>
                            </div>
                        </li>
                        <li>
                            <div class="list-spec-inner">
                                <div class="rating-star">  
                                <span class="fa fa-star"></span>   
                                <span>Rate :</span>                 
                                    <?php
                                        if ($laptop->nilai == null) {
                                            echo "<td>";
                                            foreach (range(1, 5) as $star):
                                                echo "<a href='".Config::get('url/base_url')."member/add_rating/".$laptop->id."/".$star."' class='star-no'><i class='fa fa-star fa-lg'></i></a>";
                                            endforeach;
                                            echo "</td>";

                                        }else{
                                            echo "<td>";
                                            foreach (range(1, $laptop->nilai) as $star):
                                                echo "<a href='".Config::get('url/base_url')."member/update_rating/".$laptop->id."/".$star."' class='star'><i class='fa fa-star fa-lg'></i></a>";
                                            endforeach;
                                            if ($laptop->nilai != 5) {
                                                foreach (range((1+$laptop->nilai), 5) as $star):
                                                    echo "<a href='".Config::get('url/base_url')."member/update_rating/".$laptop->id."/".$star."' class='star-no'><i class='fa fa-star fa-lg'></i></a>";
                                                endforeach;
                                            }
                                            
                                            echo "</td>";
                                        }
                                    ?> 
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>   
                
                <button type="button" class="btn btn-default hover-border">
                    <a href="<?= Config::get('url/base_url');?>member/laptop_detail/<?=$laptop->id;?>" class="detail">Detail</a>
                </button>                     
            </div>
        </div>
    </div>

<?php
        $no++;
    }
?>
</div>
    </div>
</body>
</html>