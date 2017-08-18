<?php if(!defined('KIRBY')) exit ?>

title: Category
files: true
pages:
  template: article
  sort: date desc
deletable: false
fields:
  prevnext: prevnext
  title:
    label: Title
    type:  text
    width: 3/4
  featured:
    label: Featured image
    type: image
    width: 1/4
  pageindex:
    label: Posts
    type: index
    options: children
    columns:
      title: Title
      date: Date
      uid: Slug