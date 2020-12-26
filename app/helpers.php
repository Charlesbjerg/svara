<?php
/**
 * A series of custom helper functions for use
 * within the project.
 */

/**
 * Sends a true response as JSON
 */
if (!function_exists('send_true_response')) {
    function send_true_response() {
        return json_encode(['success' => true]);
    }
}

/**
 * Sends a false response as JSON
 */
if (!function_exists('send_false_response')) {
    function send_false_response() {
        return json_encode(['success' => false]);
    }
}