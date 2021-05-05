<?php
/**
 * A series of custom helper functions for use
 * within the project.
 */
use Illuminate\Http\JsonResponse;

/**
 * Sends a true response as JSON
 *
 * @return JsonResponse
 */
if (!function_exists('sendTrueResponse')) {
    function sendTrueResponse() {
        return response()->json(['success' => true]);
    }
}

/**
 * Sends a false response as JSON
 *
 * @return JsonResponse
 */
if (!function_exists('sendFalseResponse')) {
    function sendFalseResponse() {
        return response()->json(['success' => false]);
    }
}

/**
 * Formats the timestamp to be a readable date.
 *
 * @return string
 */
if (!function_exists('formatDate')) {
    function formatDate($timestamp) {
        return \Carbon\Carbon::parse($timestamp)->format('d/m/Y');
    }
}