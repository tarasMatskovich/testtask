<?php
/**
 * Created by PhpStorm.
 * User: matsk
 * Date: 15.05.2018
 * Time: 04:41
 */

?>

<h1>Статистика пользователей</h1>


<?php if($users && count($users) > 0): ?>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Type</th>
        <th>Value</th>
        <th>Count</th>
    </tr>
    </thead>
    <tbody>
    <? $i=0; ?>
    <? foreach($mail_services as $k => $mail_service): ?>
        <tr>

            <th scope="row"><?=$i+1?></th>
            <td>Mail Service</td>
            <td><?=$mail_service[0]?></td>
            <td><?=count($mail_service)?></td>
        </tr>
        <? $i++; ?>
    <? endforeach; ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <? $i=0; ?>
    <? foreach($browsers as $k => $browser): ?>
        <tr>

            <th scope="row"><?=$i+1?></th>
            <td>Browser</td>
            <td><?=$browser[0]?></td>
            <td><?=count($browser)?></td>
        </tr>
        <? $i++; ?>
    <? endforeach; ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <? $i=0; ?>
    <? foreach($devices as $k => $device): ?>
        <tr>

            <th scope="row"><?=$i+1?></th>
            <td>Device</td>
            <td><?=$device[0]?></td>
            <td><?=count($device)?></td>
        </tr>
        <? $i++; ?>
    <? endforeach; ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <? $i=0; ?>
    <? foreach($countries as $k => $country): ?>
        <tr>

            <th scope="row"><?=$i+1?></th>
            <td>Country</td>
            <td><?=$country[0]?></td>
            <td><?=count($country)?></td>
        </tr>
        <? $i++; ?>
    <? endforeach; ?>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <? $i=0; ?>
    <? foreach($cities as $k => $city): ?>
        <tr>

            <th scope="row"><?=$i+1?></th>
            <td>City</td>
            <td><?=$city[0]?></td>
            <td><?=count($city)?></td>
        </tr>
        <? $i++; ?>
    <? endforeach; ?>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <? $i=0; ?>
    <? foreach($operating_systems as $k => $operating_system): ?>
        <tr>

            <th scope="row"><?=$i+1?></th>
            <td>Operating System</td>
            <td><?=$operating_system[0]?></td>
            <td><?=count($operating_system)?></td>
        </tr>
        <? $i++; ?>
    <? endforeach; ?>

    </tbody>
</table>
<? else: ?>
<p>В базе данных еще нет записей</p>
<?php endif; ?>

