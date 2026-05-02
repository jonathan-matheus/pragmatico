<?php
$footer_email = get_theme_mod('pragmatico_footer_email', '');
$footer_phone = get_theme_mod('pragmatico_footer_phone', '');
$footer_linkedin = get_theme_mod('pragmatico_footer_linkedin', '');
$footer_instagram = get_theme_mod('pragmatico_footer_instagram', '');
$footer_github = get_theme_mod('pragmatico_footer_github', '');
?>

<footer class="site-footer">
    <div class="container border-t border-zinc-700/50 pt-6 pb-8">
        <div class="mb-5 grid gap-2 text-[14px] leading-[22px] text-[rgba(255,255,255,0.82)] [font-family:-apple-system,BlinkMacSystemFont,'Segoe_UI',Helvetica,Arial,sans-serif,'Apple_Color_Emoji','Segoe_UI_Emoji','Segoe_UI_Symbol']">
            <?php if ($footer_email !== '') : ?>
                <p><span class="font-semibold">Email:</span> <?php echo esc_html($footer_email); ?></p>
            <?php endif; ?>
            <?php if ($footer_phone !== '') : ?>
                <p><span class="font-semibold">Phone:</span> <?php echo esc_html($footer_phone); ?></p>
            <?php endif; ?>
            <?php if ($footer_linkedin !== '') : ?>
                <p><span class="font-semibold">LinkedIn:</span> <a href="<?php echo esc_url($footer_linkedin); ?>" target="_blank" rel="noopener noreferrer" class="underline"><?php echo esc_html($footer_linkedin); ?></a></p>
            <?php endif; ?>
            <?php if ($footer_instagram !== '') : ?>
                <p><span class="font-semibold">Instagram:</span> <a href="<?php echo esc_url($footer_instagram); ?>" target="_blank" rel="noopener noreferrer" class="underline"><?php echo esc_html($footer_instagram); ?></a></p>
            <?php endif; ?>
            <?php if ($footer_github !== '') : ?>
                <p><span class="font-semibold">GitHub:</span> <a href="<?php echo esc_url($footer_github); ?>" target="_blank" rel="noopener noreferrer" class="underline"><?php echo esc_html($footer_github); ?></a></p>
            <?php endif; ?>
        </div>

        <p class="text-[13px] leading-[20px] text-[rgba(255,255,255,0.65)]">
            &copy; <?php echo esc_html(date_i18n('Y')); ?>
            <?php bloginfo('name'); ?>.
            <?php esc_html_e('Todos os direitos reservados.', 'pragmatico'); ?>
        </p>
    </div>
</footer>

</div>

<?php wp_footer(); ?>
</body>

</html>
