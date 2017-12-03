<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Perhitungan </title>

    <link href="<?= Config::get('url/base_url');?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= Config::get('url/base_url');?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= Config::get('url/base_url');?>assets/css/style_member.css" rel="stylesheet">

    <script src="<?= Config::get('url/base_url');?>assets/js/jquery.js"></script>
    <script src="<?= Config::get('url/base_url');?>assets/js/bootstrap.min.js"></script>
    <script src="<?= Config::get('url/base_url');?>assets/js/Chart.min.js"></script>
    <script src="<?= Config::get('url/base_url');?>assets/js/Chart.bundle.min.js"></script>

</head><!--/head-->
<body>
<style type="text/css" media="screen">
.table-responsive {
    overflow-x: auto;
    min-height: .01%;
}
.panel-default>.panel-heading{
    background: #8e0767;
    color: #fff;
    padding: 15px 10px;
    font-size: 1.6em;
}
.l-terkait{
    background: #fff;
    padding: 10px 20px;
}
.laptop-detail-img{
    height: 420px;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus{
    padding: 10px 20px;
}
.nav-tabs > li > a{
    padding: 10px 20px;
    background: #8e0767;
    color: #fff;
}
.nav-tabs > li > a:hover{
    color: #555;
    background: #fff;
}
.nav-tabs{
    margin-bottom: 20px;
}
</style>
<div class="container">
<h2>recommendation dengan collaborative filtering </h2>   
<div class="profil">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#rating-u" aria-controls="rating-u" role="tab" data-toggle="tab">Rating User</a></li>
        <li role="presentation"><a href="#sim" aria-controls="sim" role="tab" data-toggle="tab">Similarity Item</a></li>
        <li role="presentation"><a href="#prediksi" aria-controls="prediksi" role="tab" data-toggle="tab">prediksi</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="rating-u">
            <table class="table">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>rate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($data['CFCollection']['ratingUser'] as $name => $rate) {
                                echo "<tr>";
                                echo "<td>".$name."</td>";
                                echo "<td>".$rate."</td>";
                                echo"</tr>";
                            }
                        ?>
                    </tbody>
                </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="sim">
           <?php echo $data['CFsim']; ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="prediksi">
            <canvas id="pie1" height="200" width="" style="width: 470px; height: 315px;"></canvas>
            <script>
                var config1 = {
                    type: 'bar',
                    data: {
                        datasets: [{
                            data: [
                                <?php foreach ($data['CF'] as $key => $bobot) {
                                        echo $bobot.",";
                                } ?>
                            ],
                            backgroundColor: [
                                <?php 
                                foreach ($data['CF'] as $key => $value) {
                                    echo "'"."rgb(".rand(1,225).", ".rand(1,225).", ".rand(1,225).")"."',";
                                } 
                                ?>
                            ],
                            label: 'bobot Tertinggi'
                        }],
                        labels: [
                            <?php foreach ($data['CF'] as $key => $value) {
                                echo "'".substr($key, 0, 20)."....',";
                            } ?>
                        ]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Bobot Rekomendasi dengan TF-IDF'
                        },
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        }
                    }
                };
            </script>
            <hr>
            <?php echo $data['CFPredict']; ?>
        </div>
    </div>
</div>


<h2>recommendation dengan tfidf</h2>
<?php 
// 14454000
    $tfidf = $data['tfidf']; 
    $TFIDFcollection = $tfidf->getCollection();
    $hasil    = array_slice($data['tfidf-hasil'], 0, 4);
?>
<div class="profil">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Query</a></li>
        <li role="presentation" class="active"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Hasil</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="home">
            <?php  
                echo $tfidf->toTable();
            ?>
        </div>
        <div role="tabpanel" class="tab-pane active" id="messages">
            <canvas id="pie3" height="200" width="" style="width: 470px; height: 315px;"></canvas>
            <script>
                var config3 = {
                    type: 'bar',
                    data: {
                        datasets: [{
                            data: [
                                <?php foreach ($hasil as $key => $bobot) {
                                        echo $bobot.",";
                                } ?>
                            ],
                            backgroundColor: [
                                <?php 
                                foreach ($hasil as $key => $value) {
                                    echo "'"."rgb(".rand(1,225).", ".rand(1,225).", ".rand(1,225).")"."',";
                                } 
                                ?>
                            ],
                            label: 'bobot Tertinggi'
                        }],
                        labels: [
                            <?php foreach ($hasil as $key => $value) {
                                echo "'".substr($key, 0, 20)."....',";
                            } ?>
                        ]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Bobot Rekomendasi dengan TF-IDF'
                        },
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        }
                    }
                };
            </script>
            <table class="table">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>rate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($hasil as $name => $rate) {
                            echo "<tr>";
                            echo "<th>".$name."</th>";
                            echo "<th>".$rate."</th>";
                            echo"</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<script>
    window.onload = function() {
        
        var ctx1 = document.getElementById("pie1").getContext("2d");
        window.myDoughnut = new Chart(ctx1, config1);
        var ctx3 = document.getElementById("pie3").getContext("2d");
        window.myDoughnut = new Chart(ctx3, config3);
    };
</script>
</body>
</html>