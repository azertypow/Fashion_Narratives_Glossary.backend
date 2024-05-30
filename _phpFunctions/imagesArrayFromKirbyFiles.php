<?php

function imagesArrayFromKirbyFiles(\Kirby\Cms\Files $files): array
{
    return $files->map(fn(\Kirby\Cms\File $file): array => [
        'url'       => $file->url(),
        'width'     => $file->width(),
        'height'    => $file->height(),
        'title'     => $file->title()->value(),
        'credit'    => $file->credit()->value(),
        'resize'    => [
            'tiny'      => $file->resize(50, null, 10)->url(),
            'small'     => $file->resize(500)->url(),
            'reg'       => $file->resize(1280)->url(),
            'large'     => $file->resize(1920)->url(),
            'xxl'       => $file->resize(2500)->url(),
        ]
    ])->data();
}
