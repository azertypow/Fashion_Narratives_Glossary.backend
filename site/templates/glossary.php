<?php

include_once '_phpFunctions/imagesArrayFromKirbyFiles.php';

/** @global Kirby\Cms\App $kirby */
/** @global Kirby\Cms\Site $site */
/** @global Kirby\Cms\Page $page */

header("Access-Control-Allow-Origin: *");
$kirby->response()->type('application/json');

echo json_encode([
  'title'     => $page->title()->value(),
  'pages'     => array_values($page->children()->map(function (Kirby\Cms\Page $glossaryItem) {
    return [
      'title'   => $glossaryItem->title()->value(),
      'uri'     => $glossaryItem->uri(),
      'url'     => $glossaryItem->url(),
      'images'  => array_values(imagesArrayFromKirbyFiles($glossaryItem->images())),
    ];
  })->data()),
]);
