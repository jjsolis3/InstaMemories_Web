<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= isset($title) ? $title : 'O-Tech' ?></title>

<!-- fav icon -->
<?php if (isset($logo2)): ?>
    <link rel="shortcut icon" href="assets/img/icons/vl-fav-ic-1.2.svg">
<?php elseif (isset($logo3)): ?>
    <link rel="shortcut icon" href="assets/img/icons/vl-fav-ic-1.3.svg">
<?php else: ?>
    <link rel="shortcut icon" href="assets/img/icons/vl-fav-ic-1.1.svg">
<?php endif; ?>