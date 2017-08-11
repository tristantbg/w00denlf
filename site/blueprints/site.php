<?php if(!defined('KIRBY')) exit ?>

title: Site
fields:
  generalSettings:
    label: Site Settings
    type: headline
  title:
    label: Title
    type:  text
  description:
    label: Description
    type:  textarea
  keywords:
    label: Keywords
    type:  tags
  customcss:
    label: Custom CSS
    type: textarea
    buttons: false
  googleAnalytics:
    label: Google Analytics ID
    type: text
    icon: code
    help: Tracking ID in the form UA-XXXXXXXX-X. Keep this field empty if you are not using it.
    width: 1/2
  ogimage:
    label: Facebook OpenGraph image
    type: image
    help: 1200x630px minimum
    width: 1/2
  socials:
    label: Social Links
    type: structure
    style: table
    fields:
      name:
        label: Name
        type: text
        icon: font
      link:
        label: Link
        type: url