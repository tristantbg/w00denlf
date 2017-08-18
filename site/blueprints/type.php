<?php if(!defined('KIRBY')) exit ?>

title: Type
files: true
pages: false
fields:
  prevnext: prevnext
  autoid:
    label: ID
    type: hidden
    readonly: true
  title:
    label: Title
    type:  text
    width: 2/4
  featured:
    label: Featured image
    type: image
    width: 1/4
  featuredcolor:
    label: Featured color
    type: color
    width: 1/4
  text:
    label: Description
    type: textarea
