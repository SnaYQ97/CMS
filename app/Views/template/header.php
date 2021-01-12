<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Load Fonts from viewdata -->
        <?php if( isset($fonts) && is_array($fonts) ) : ?>
            <?php foreach( $fonts as $font ) : ?>
                <link href=<?= $font ?> rel="stylesheet">
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- Load Styles from viewdata -->
        <?php if( isset($styles) && is_array($styles) ) : ?>
            <?php foreach( $styles as $style ) : ?>
                <link href=<?=base_url("$style")?> rel="stylesheet">
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- Load Scripts from viewdata -->
        <?php if( isset($scripts) && is_array($scripts) ) : ?>
            <?php foreach( $scripts as $script ) : ?>
                <script src=<?=base_url("$script")?>></script>
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- Load defer scripts from viewdata -->
        <?php if( isset($defers) && is_array($defers) ) : ?>
            <?php foreach( $defers as $defer ) : ?>
                <script defer src=<?=base_url("$defer")?>></script>
            <?php endforeach; ?>
        <?php endif; ?>
        <title><?= $title ?></title>
    </head>