<?php
/*
Plugin Name: PDFWriter
Description
Version: Beta 1.0
Author: Nils Steinkamp
*/

require_once("plugin_activation.php");
register_activation_hook( __FILE__, 'activation' );
require_once("admin_menu.php");

//-------csvcontact-----------------
require_once("pdfwriter/pdf_form.php");
require_once("pdfwriter/write_to_pdf.php");

add_action( 'admin_post_pdf_submit', 'write_to_pdf' );
add_action( 'admin_post_nopriv_pdf_submit', 'write_to_pdf' );

add_shortcode("pdfwriter", "pdf_form");
//----------------------------------
