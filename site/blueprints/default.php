<?php if(!defined('KIRBY')) exit ?>

title: Page
pages: false
files: true
fields:
  title:
    label: Title
    type:  text
    width: 3/4
  featured:
    label: Featured image
    type: image
    width: 1/4
  text:
    label: Text
    type:  textarea