<?php

include_once '_phpFunctions/imagesArrayFromKirbyFiles.php';

/** @global Kirby\Cms\App $kirby */
/** @global Kirby\Cms\Site $site */
/** @global Kirby\Cms\Page $page */

header("Access-Control-Allow-Origin: *");
$kirby->response()->type('application/json');

echo json_encode([
  'title'     => $page->title()->value(),
  'pages'     => array_values($page->children()->map(function (Kirby\Cms\Page $scenarioItem) {
    return [
      'title'   => $scenarioItem->title()->value(),
      'uri'     => $scenarioItem->uri(),
      'url'     => $scenarioItem->url(),
      'images'  => array_values(imagesArrayFromKirbyFiles($scenarioItem->images())),
    ];
  })->data()),
]);
