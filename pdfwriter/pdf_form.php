<?php
function pdf_form( $attr ){

    $attributes = shortcode_atts(
        array(
            'content' => '',
        ),
        $attr
    );

    $output = '<div id="maindiv"><form enctype="multipart/form-data" action="';
    $output .= admin_url('admin-post.php');
    $output .= '" method="post" ><input type="hidden" name="action" value="pdf_submit"><input type="hidden" name="MAX_FILE_SIZE" value="3000000" >';

    $output .= file_get_contents('inputs/imageupload.html', true);



    $output .= str_replace('text_button', 'Submit', file_get_contents('inputs/submit.html', true));
    $output .= '</form></div>';

    return $output;
}
?>