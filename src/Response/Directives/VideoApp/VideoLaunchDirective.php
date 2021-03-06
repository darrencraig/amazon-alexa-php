<?php

namespace MaxBeckers\AmazonAlexa\Response\Directives\VideoApp;

use MaxBeckers\AmazonAlexa\Response\Directives\Directive;


/**
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
class VideoLaunchDirective extends Directive
{
    const TYPE = 'VideoApp.Launch';

    /**
     * @var VideoItem|null
     */
    public $videoItem;
}
