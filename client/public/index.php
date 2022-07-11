<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <meta property="og:title" content="<%= htmlWebpackPlugin.options.title %>"/>
    <meta property="og:url" content="<%= htmlWebpackPlugin.options.pageUrl %>"/>
    <meta property="og:image" content="<%= htmlWebpackPlugin.options.pageUrl %>meta.jpg"/>
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:description" content="<%= htmlWebpackPlugin.options.description %>"/>
    <link rel="icon" href="<%= BASE_URL %>favicon.ico">

    <title><%= htmlWebpackPlugin.options.title %></title>
  </head>
  <body>
    <noscript>
      <strong>We're sorry but <%= htmlWebpackPlugin.options.title %> doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
    </noscript>
    <div id="app"></div>
    <!-- built files will be auto injected -->
  </body>
</html>