<?php
require_once get_template_directory() . '/includes/classes/class.getColor.php';
$color = new GetColor();
?>
<div class="mt-[32px]">
    <h2 class="text-white font-1-l text-center">Entre em contato!</h2>
    <p class="text-[<?= $color::secondary(); ?>] text-center font-2-xs">Você pode me encontrar nas seguintes redes
        socias</p>
    <div class="flex gap-3 text-center justify-center mt-[14px] mb-[60px]">
        <img src="<?= get_template_directory_uri() . '/assets/img/whatsapp.png' ?>" alt="">
        <p class="text-white">+55 (82) 9 8829 - 0728</p>
    </div>
</div>
</div>
<?php wp_footer() ?>
</body>

</html>