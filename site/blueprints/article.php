<?php if(!defined('KIRBY')) exit ?>

title: Article
files: true
pages: false
files:
  fields:
    videolink:
      label: Video Link
      type: url
      help: Youtube or Vimeo
    videofile:
      label: Video File
      type: select
      options: videos
    contentsize:
      label: Size
      type: radio
      default: large
      options:
        small: Small
        medium: Medium
        large: Large
      columns: 3
fields:
  prevnext: prevnext
  title:
    label: Title
    type:  text
    width: 2/4
  date:
    label: Post date
    type:  date
    format: DD-MM-YYYY
    default: today
    required: true
    width: 1/4
  featured:
    label: Featured image
    type: image
    width: 1/4
  text:
    label: Chapeau
    type: textarea
    width: 1/2
  type:
    label: Type
    type: radio
    options: query
    query:
      page: types
      fetch: visibleChildren
      value: '{{autoid}}'
      text: '{{title}}'
    width: 1/2
  sections:
    label: Sections
    type: builder
    fieldsets:
      bodytext:
        label: Body Text
        snippet: sections/bodytext
        fields:
          text:
            label: text
            type: textarea