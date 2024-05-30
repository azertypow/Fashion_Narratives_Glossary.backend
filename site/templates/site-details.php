<?php

/** @global Kirby\Cms\App $kirby */
/** @global Kirby\Cms\Site $site */
/** @global Kirby\Cms\Page $page */

header("Access-Control-Allow-Origin: *");
$kirby->response()->type('application/json');

echo json_encode([
  'title'     => $site->title()->value(),
  'introText' => $page->introText()->value(),
  'teamText'  => $page->teamText()->value(),
  'teamAbout' => $page->teamAbout()->value(),
]);
