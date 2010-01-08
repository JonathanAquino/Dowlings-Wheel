<?php
/**
 * Miscellaneous global functions.
 */

/**
 * HTML-encodes a string.
 *
 * @param $text string  plain text
 * @return string  HTML
 */
function qh($text) {
    return htmlentities($text, ENT_QUOTES, 'UTF-8');
}

/**
 * Provide the value of a variable if it's already set, or a default if not
 * this is used in the shared bazel-pretzel activity code.
 *
 * @param $var mixed variable to examine
 * @return mixed
 */
function ifsetor(&$var, $default = null) {
    return is_null($var) ? $default : $var;
}
