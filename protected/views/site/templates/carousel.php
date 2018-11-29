<div id="carouselBoilerplate" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php for($i=0; $i < count($carousel); $i++):?>

            <li data-target="#carouselBoilerplate" data-slide-to="<?php echo $i; ?>" class="<?php if($i==0){echo 'active';} ?>"></li>

        <?php endfor; ?>
    </ol>
    <div class="carousel-inner">
        <?php $index=1; foreach($carousel as $item):?>

            <div class="carousel-item <?php if($index==1){echo 'active';} ?>">

                <img class="d-block w-100 img-fluid" src="<?php echo Yii::app()->request->baseUrl.$item->img; ?>" style="height: 800px;">

                <div class="carousel-caption d-none d-md-block">

                    <h3><?php echo $item->title; ?></h3>

                    <p><?php echo $item->description; ?></p>

                </div>

            </div>

        <?php $index++; endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselBoilerplate" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselBoilerplate" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>