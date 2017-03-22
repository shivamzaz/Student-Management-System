<?php
$theme_bg_color = "#428bca";
$theme_primary_color = "#FFF";
$theme_secondary_color = "#FFF";
$footer_bg_color = "#F8F8F8";
?>



@include('emails.partials.intro-header', [
  'theme_bg_color'        => $theme_bg_color,
  'theme_primary_color'   => $theme_primary_color,
  'theme_secondary_color' => $theme_secondary_color,
  'main_heading'          => $main_heading,
  'sub_heading'           => $sub_heading,
  'header_text'           => $header_text
])

@include('emails.partials.message-section', [
  'message'             =>  $message,
  'sub_message'         =>  $sub_message,
  'sub_message_heading' =>  $sub_message_heading,
  'footer_message'      =>  $footer_message,
  'theme_bg_color'      =>  $theme_bg_color
])

@include('emails.partials.footer', [
  'theme_bg_color'  =>  $theme_bg_color,
  'footer_bg_color' =>  $footer_bg_color,
  'click_to_action' =>  $click_to_action,
  'button_text'     =>  $button_text,
  'button_link'     =>  $button_link

])