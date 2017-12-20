<li><a href="/contacts">Контакты</a></li>
<?php if ($model): ?>
    <?php foreach ($model as $num): ?>
        <li class="add-telephone"><a><?= $num['phone_number'] ?></a></li>
    <?php endforeach; ?>
    <?php foreach ($model as $fax): ?>
        <li class="fix-before"><a><?= $fax['fax_number'] ?></a></li>
    <?php endforeach; ?>
    <?php foreach ($model as $address): ?>
        <li class="add-marker"><a><?= $address['address'] ?></a></li>
    <?php endforeach; ?>
<?php endif; ?>