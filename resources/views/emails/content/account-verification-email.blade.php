<?php
$main_heading = "Hello, " . $userName;
$sub_heading = "We welcome you to " . env('APP_NAME');
$header_text = "Please verify your account.";

$message = "Click on the button below to verify.";
$sub_message_heading = "Here are just some of the ways in which you can use this app.";

$sub_message = '<ul>'.
  '<li>Create Polls</li>'.
  '<li>Vote on other Polls</li>'.
  '</ul>';

$footer_message = "P.S: We hate spam too.";

$click_to_action = true;
$button_text = "Verify my account";
$button_link = $verificationLink;
?>

@extends('emails.layouts.master', [

  /* Intro header */
  'main_heading'  =>  $main_heading,
  'sub_heading'   =>  $sub_heading,
  'header_text'   =>  $header_text,

  /* Message Section */
  'message'             =>  $message,
  'sub_message'         =>  $sub_message,
  'sub_message_heading' =>  $sub_message_heading,
  'footer_message'      =>  $footer_message,

  /* Footer */
  'click_to_action' =>  $click_to_action,
  'button_text'     =>  $button_text,
  'button_link'     =>  $button_link

])