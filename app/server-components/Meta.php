<title><?php echo el($props, 'title'); ?></title>
<meta name="description" content="<?php echo el($props, 'description'); ?>">
<meta name="keywords" content="<?php echo el($props, 'keywords'); ?>">

<!-- OGP -->
<meta property="og:site_name" content="green spot">
<meta property="og:type" content="<?php echo el($props, 'path') === '/' ? 'website' : 'article' ?>">
<meta property="og:locale" content="ja_JP">
<meta property="og:image" content="https://in-green-spot.com/assets/img/accela/ogp.png">
<meta property="og:url" content="https://in-green-spot.com<?php echo el($props, 'path', '/'); ?>">
<meta property="og:title" content="<?php echo el($props, 'title'); ?>">
<meta property="og:description" content="<?php echo el($props, 'description'); ?>">
