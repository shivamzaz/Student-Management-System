<?php
$main_heading = "Hello, " . $userName;
$sub_heading = "It seems like you have misplaced your password for " . env('APP_NAME');
$header_text = "Do not worry. We have got your back.";

$message = "Click on the button below to reset your password.";
$sub_message_heading = "";

$sub_message = '';

$footer_message = "Student Management System.";

$click_to_action = true;
$button_text = "Reset my password.";
$button_link = $forgotPasswordLink;
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