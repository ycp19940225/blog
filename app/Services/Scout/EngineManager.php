<?php
namespace App\Services\Scout;

use AlgoliaSearch\Client as Algolia;
use AlgoliaSearch\Version as AlgoliaUserAgent;
use Laravel\Scout\EngineManager as BaseEngineManager;
use Laravel\Scout\Engines\AlgoliaEngine;

/**
 *
 */
class EngineManager extends BaseEngineManager
{
    public function createAlgoliaDriver()
    {
        AlgoliaUserAgent::addSuffixUserAgentSegment('Laravel Scout', '3.0.10');

        $algolia = new Algolia(
            config('scout.algolia.id'), config('scout.algolia.secret')
        );
        // 设置连接超时时间
        $algolia->setConnectTimeout(30, 30, 30);
        return new AlgoliaEngine($algolia);
    }
}