<?php if(!defined('KIRBY')) exit ?>

title: Category
files: true
pages:
  template: article
  sort: date desc
  num:
    mode: date
    field: date
    format: YmdHi
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
    rows: 50
    columns:
      title: Title
      date:
        label: Date
        snippet: index/modified
      uri:
        label: Type
        snippet: index/type