<?php
/**
 * ACF Flexible Layout Loop
 */
while (has_sub_field("contents")) {
    get_template_part(sprintf("content/%s", get_row_layout()));
}
?>