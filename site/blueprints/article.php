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
  date:
    label: Post date
    type:  datetime
    date:
      format: DD.MM.YYYY
    time:
      format: 12
      interval: 15
    default: today now
    required: true
    width: 1/3
  type:
    label: Type
    type: radio
    options: query
    required: true
    query:
      page: types
      fetch: visibleChildren
      value: '{{autoid}}'
      text: '{{title}}'
    width: 1/3
    columns: 1
  featured:
    label: Featured image
    type: image
    width: 1/3
  text:
    label: Chapeau
    type: textarea
  sections:
    label: Sections
    type: builder
    fieldsets:
      bodytext:
        label: Text
        snippet: sections/bodytext
        fields:
          text:
            label: Text
            type: textarea
      images:
        label: Images
        snippet: sections/slider
        fields:
          medias:
            label: Images
            type: images
      embed:
        label: Embed
        snippet: sections/embed
        fields:
          url:
            label: URL
            type: url