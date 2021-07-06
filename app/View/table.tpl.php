<? foreach ($pageData as $userId=>$data) { ?>
        <? foreach ($data as $value) { ?>
        <div><?=$userId?>, <?=$value[1]?>, <?=$value[2]?>, <?=$value[3]?>, <?=$value[4]?></div>
        <p>➔ phone number is from "<?=$value['phoneGeo']?>", IP is from "<?=$value['ipGeo']?>"</p>
        <?}?>
        <p><b>As a result report for Customer ID <?=$userId?> we have:</b></p>
        <p>➔ Number of customer's calls within same continent: <?=$data['total']['sameContinent']?></p>
        <p>➔ Total duration of customer's calls within same continent: <?=$data['total']['sameSeconds']?> seconds</p>
        <p>➔ Number of all customer's calls: <?=$data['total']['allCalls']?></p>
        <p>➔ Total duration of all customer's calls: <?=$data['total']['allSeconds']?> seconds.</p>
        <hr />
<? } ?>