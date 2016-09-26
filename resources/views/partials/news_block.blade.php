<div class="news-wrapper col-xs-10 col-xs-push-1 no-padding">

    <div class="block-row col-xs-12 no-padding ">
        <div class="col-xs-4">
            <a href="over-ons" class="news-item news-item-orange col-xs-12 no-padding">
                <div class="news-image no-padding" style="background-image: url('img/wie-zijn-wij.jpg')">
                    <h3 class="news-heading no-margin">Over Ons</h3>
                    <div class="news-sub-info col-xs-12">
                        <div class="default-seperator"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xs-4">
            <a href="allergie-dieet" class="news-item news-item-yellow col-xs-12 no-padding">
                <div class="news-image no-padding" style="background-image: url('img/raamsdonksveer.jpg')">
                    <h3 class="news-heading no-margin">Allergieën en Dieet</h3>
                    <div class="news-sub-info col-xs-12">
                        <div class="default-seperator"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xs-4">
            <a href="biologisch-brood" class="news-item news-item-grey col-xs-12 no-padding">
                <div class="news-image no-padding" style="background-image: url('img/zonnemaire.jpg')">
                    <h3 class="news-heading no-margin">Biologisch brood</h3>
                    <div class="news-sub-info col-xs-12">
                        <div class="default-seperator"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="block-row col-xs-12 no-padding">
        <?php $i = 0; ?>
        @foreach($news as $news_item)
            <div class="col-xs-4">
                <a href="news/{{$news_item->id}}/{{$news_item->heading}}" class="news-item col-xs-12 no-padding
                <?php if($i == 0){
                    echo 'news-item-green';
                } else if($i == 1){
                    echo 'news-item-orange';
                } else if($i == 2){
                    echo 'news-item-yellow';
                }
                ?>
                ">
                    <div class="news-image no-padding" style="background-image: url('{{$news_item->img_path}}')">
                        <h3 class="news-heading no-margin">{{ $news_item->heading }}</h3>
                        <div class="news-sub-info col-xs-12">
                            <div class="default-seperator"></div>
                        </div>
                    </div>
                </a>
            </div>
        <?php $i++; ?>
        @endforeach
    </div>

</div>
