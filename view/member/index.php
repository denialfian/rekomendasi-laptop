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
.hover-border{
    text-align: center;
    display: inline-block;
}
</style>
<?php  
    $rekomendasi = $data['r'];
    $produk      = $data['produk'];
?>
<div class="col-md-9 slider">
<br>
    <?php if (Session::exists('sukses-login')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Success!</strong> <?php echo Session::flash('sukses-login'); ?>
        </div>
    <?php endif ?>

    <?php if (Session::exists('sukses-rek-ganti')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Success!</strong> <?php echo Session::flash('sukses-rek-ganti'); ?>
        </div>
    <?php endif ?>

    <?php if (Session::exists('gagal-rek-ganti')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Success!</strong> <?php echo Session::flash('gagal-rek-ganti'); ?>
        </div>
    <?php endif ?>

    <form class="form-horizontal" action="<?= Config::get('url/base_url');?>member/set_rekomendasi" method="POST">

        <div class="form-group">
        <!-- Button trigger modal -->
            <label for="" class="col-sm-3 control-label hor-form">Metode Rekomendasi :</label>
            <div class="col-sm-6">
                <select name="rekomendasi" class="form-control">
                <?php switch ($data['rekType']->rekomendasi) {
                    case 'cf':
                        echo '<option value="cf" selected>Collaboative Filtering</option>';
                        echo'<option value="cb">Content-based Filtering</option>';
                        echo'<option value="mixed">Mixed Hybrid</option>';
                        break;

                    case 'cb':
                        echo '<option value="cf">Collaboative Filtering</option>';
                        echo'<option value="cb" selected>Content-based Filtering</option>';
                        echo'<option value="mixed">Mixed Hybrid</option>';
                        break;

                    case 'mixed':
                        echo '<option value="cf">Collaboative Filtering</option>';
                        echo'<option value="cb">Content-based Filtering</option>';
                        echo'<option value="mixed" selected>Mixed Hybrid</option>';
                        break;

                    default:
                        echo '<option value="cf">Collaboative Filtering</option>';
                        echo'<option value="cb">Content-based Filtering</option>';
                        echo'<option value="mixed" selected>Mixed Hybrid</option>';
                    break;
                } ?> 
                </select>         
            </div>
            <input type="hidden" name="token" value="<?=Token::create('set_rekomendasi');?>">
            <button type="submit" class="btn btn-primary">Save</button>
            <i class="fa fa-info btn btn-primary btn-md" data-toggle="modal" data-target="#myModal"></i>
        </div>
    </form>
    <hr>
    <div id="carousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <?php
                foreach (range(0, count($rekomendasi) - 1) as $key):
                    if ($key == 0) {
                        $active = "active";
                    }else{
                        $active = "";
                    }
            ?>
                <div class="item <?=$active;?>">
                    <img alt="Bootstrap template" src="<?= Config::get('url/base_url');?>upload/laptop/<?=$rekomendasi[$key][0]->gambar;?>" class="slide-img img-responsive">
                    <div class="carousel-caption">
                        <h3><?php echo $rekomendasi[$key][0]->name;?></h3>
                        <button type="button" class="btn btn-primary">
                            <a href="<?= Config::get('url/base_url');?>member/laptop_detail/<?=$rekomendasi[$key][0]->id;?>" title="">DETAIL</a>
                        </button>
                    </div>
                </div>
            <?php
                endforeach;
            ?>
            
        </div>

        <ul class="nav nav-pills nav-justified">
            <?php
                foreach (range(0, count($rekomendasi) - 1) as $key):
                    if ($key == 0) {
                        $active = "active";
                    }else{
                        $active = "";
                    }
            ?>
                <li data-target="#carousel1" data-slide-to="<?=$key;?>" class="<?=$active;?>">
                    <a href="#">Rekomendasi <small>Untuk Anda</small></a>
                </li>
            <?php
                endforeach;
            ?>
        </ul>
    </div>
</div>

<div class="row">
<?php
    $no = 0;
    $stop = 6;
    foreach ($produk as $laptop) {
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
                                <span class="fa fa-laptop"></span>
                                <span>Brand : <?=$laptop->brand;?></span>
                            </div>
                        </li>
                        <li>
                            <div class="list-spec-inner">
                                <span class="fa fa-gear"></span>
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
                
                
                <a href="<?= Config::get('url/base_url');?>member/laptop_detail/<?=$laptop->id;?>" class="hover-border">Detail</a>
                                   
            </div>
        </div>
    </div>

<?php
        $no++;
    }
?>
</div>

<div class="paginate">
    <?php echo $data['pageLink']; ?>
</div>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">penjelasan tentang metode rekomendasi</h4>
            </div>
            <div class="modal-body">
                <blockquote>
                    <p>Collaborative Filtering : Rekomendasi bekerja dengan menyamakan ketertaikan user lain </p>
                </blockquote>
                <blockquote>
                    <p>Content-based : Rekomendasi bekerja dengan menyamakan ketertariakn minat user</p>
                </blockquote>
                <blockquote>
                    <p>Mixed Hybrid : Penggabungan collaborative Filtering dan Content-based Filtering </p>
                </blockquote>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(function ($) {
        $('#carousel1').carousel({
            interval: 2000
        });

        var clickEvent = false;

        $('#carousel1').on('click', '.nav a', function () {
            clickEvent = true;
            $('.nav li').removeClass('active');
            $(this).parent().addClass('active');
        }).on('slid.bs.carousel', function (e) {
            if (!clickEvent) {
                var count = $('.nav').children().length - 1;
                var current = $('.nav li.active');
                current.removeClass('active').next().addClass('active');
                var id = parseInt(current.data('slide-to'));
                if (count == id) {
                    $('.nav li').first().addClass('active');
                }
            }
            clickEvent = false;
        });
    });
</script>