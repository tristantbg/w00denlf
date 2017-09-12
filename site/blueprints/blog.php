<?php if(!defined('KIRBY')) exit ?>

title: Blog
files: false
pages:
  template: category
deletable: false
fields:
  title:
    label: Title
    type:  text
  pageindex:
    label: Posts
    type: index
    options: visibleGrandchildren
    rows: 50
    sort: flip
    columns:
      title: Title
      uri: Slug
      uri:
        label: Type
        snippet: index/type
      date:
        label: Date
        sort: desc
        snippet: index/modified