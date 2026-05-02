<?php

/**
 * pt-br: Impede que o arquivo seja executado fora do WordPress.
 * 
 * en: Prevents the file from running outside of WordPress.
 */
if (!defined('ABSPATH')) {
    exit;
}

$message = isset($args['message']) && is_string($args['message'])
    ? $args['message']
    : __('Hello, I\'m an indie app developer', 'pragmatico');
?>

<section class="py-6">
    <div class="mx-auto w-full max-w-2xl rounded-xl bg-zinc-800/85 px-6 py-4 text-center shadow-sm">
        <p class="text-lg pragmatico-text-color"><?php echo esc_html($message); ?></p>
    </div>
</section>