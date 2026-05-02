<?php

if (!defined('ABSPATH')) {
    exit;
}

$section_title = isset($args['section_title']) && is_string($args['section_title'])
    ? $args['section_title']
    : __('Experience', 'pragmatico');
?>

<section class="py-8">
    <div class="mx-auto w-full max-w-3xl">
        <h3 class="inline-block border-b-4 border-zinc-500 pb-1 text-[20px] leading-[24px] font-bold text-[rgba(255,255,255,0.92)] [font-family:'M_PLUS_Rounded_1c',sans-serif]">
            <?php echo esc_html($section_title); ?>
        </h3>

        <div class="mt-6 space-y-6">
            <?php
            $experience_query = new WP_Query([
                'post_type' => 'prag_experience',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            ]);

            if ($experience_query->have_posts()) :
                while ($experience_query->have_posts()) :
                    $experience_query->the_post();

                    $experience_id = get_the_ID();
                    $company_logo = get_post_meta($experience_id, '_pragmatico_company_logo', true);
                    $role = get_post_meta($experience_id, '_pragmatico_role', true);
                    $company_name = get_post_meta($experience_id, '_pragmatico_company_name', true);
                    $location = get_post_meta($experience_id, '_pragmatico_location', true);
                    $work_type = get_post_meta($experience_id, '_pragmatico_work_type', true);
                    $work_start = get_post_meta($experience_id, '_pragmatico_work_start', true);
                    $work_end = get_post_meta($experience_id, '_pragmatico_work_end', true);
                    $work_current = get_post_meta($experience_id, '_pragmatico_work_current', true);
                    $description = get_the_content(null, false, $experience_id);

                    if ($role === '') {
                        $role = get_the_title($experience_id);
                    }

                    $work_period = '';
                    if ($work_start !== '') {
                        $start_timestamp = strtotime($work_start);
                        $formatted_start = $start_timestamp ? wp_date('M Y', $start_timestamp) : $work_start;

                        if ($work_current === '1') {
                            $work_period = $formatted_start . ' - ' . __('Present', 'pragmatico');
                        } else {
                            $end_timestamp = strtotime($work_end);
                            $formatted_end = $end_timestamp ? wp_date('M Y', $end_timestamp) : $work_end;
                            $work_period = $formatted_start . ($formatted_end !== '' ? ' - ' . $formatted_end : '');
                        }
                    }
                    ?>
                    <article class="flex gap-4 rounded-xl bg-zinc-900/40 p-4 ring-1 ring-zinc-700/60">
                        <div class="shrink-0">
                            <?php if ($company_logo !== '') : ?>
                                <img
                                    src="<?php echo esc_url($company_logo); ?>"
                                    alt="<?php echo esc_attr($company_name); ?>"
                                    class="h-12 w-12 rounded-md object-cover"
                                >
                            <?php else : ?>
                                <div class="flex h-12 w-12 items-center justify-center rounded-md bg-zinc-700 text-[12px] font-semibold text-zinc-200">
                                    <?php echo esc_html(substr($company_name, 0, 2)); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="min-w-0 flex-1">
                            <h4 class="text-[16px] leading-[24px] font-semibold text-[rgba(255,255,255,0.95)]">
                                <?php echo esc_html($role); ?>
                            </h4>

                            <p class="text-[14px] leading-[22px] font-normal text-[rgba(255,255,255,0.82)]">
                                <?php echo esc_html($company_name); ?>
                            </p>

                            <p class="mt-1 text-[13px] leading-[20px] font-normal text-[rgba(255,255,255,0.65)]">
                                <?php echo esc_html($work_period); ?>
                                <?php if ($location !== '' || $work_type !== '') : ?>
                                    <span class="mx-1">•</span>
                                    <?php echo esc_html(trim($location . ' | ' . $work_type, ' |')); ?>
                                <?php endif; ?>
                            </p>

                            <div class="mt-3 text-[15px] leading-[24px] font-normal text-[rgba(255,255,255,0.92)] [&_p]:mb-4 [&_p:last-child]:mb-0">
                                <?php echo wpautop(wp_kses_post($description)); ?>
                                </div>
                        </div>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
