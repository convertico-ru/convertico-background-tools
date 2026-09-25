<?php
/**
 * Plugin Name: Image Tools by Convertico.ru
 * Plugin URI: https://convertico.ru/remove-background/
 * Description: Adds a quick Media Library action for opening image attachments in the Convertico.ru Background Remover workflow.
 * Version: 0.1.0
 * Author: Convertico.ru contributors
 * License: MIT
 * Requires at least: 6.0
 * Requires PHP: 7.4
 */

if (!defined('ABSPATH')) {
    exit;
}

function convertico_background_tools_attachment_actions($actions, $post) {
    if (!$post || !wp_attachment_is_image($post->ID)) {
        return $actions;
    }

    $tool_url = 'https://convertico.ru/remove-background/';

    $actions['convertico_remove_background'] = sprintf(
        '<a href="%s" target="_blank" rel="noopener noreferrer">%s</a>',
        esc_url($tool_url),
        esc_html__('Remove background with Convertico.ru', 'convertico-background-tools')
    );

    return $actions;
}
add_filter('media_row_actions', 'convertico_background_tools_attachment_actions', 10, 2);
