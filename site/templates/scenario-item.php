<?php

include_once '_phpFunctions/imagesArrayFromKirbyFiles.php';

/** @global Kirby\Cms\App $kirby */
/** @global Kirby\Cms\Site $site */
/** @global Kirby\Cms\Page $page */

header("Access-Control-Allow-Origin: *");
$kirby->response()->type('application/json');

echo json_encode([
  'title'     => $page->title()->value(),
  'teamText'  => $page->teamText()->value(),
  'images'    => array_values(imagesArrayFromKirbyFiles(
    $page->images()
  )),
]);
