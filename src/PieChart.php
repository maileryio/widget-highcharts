<?php

namespace Mailery\Widget\Highcharts;

use Mailery\Widget\Highcharts\HighchartsAssetBundle;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Html\Tag\CustomTag;
use Yiisoft\Widget\Widget;

class PieChart extends Widget
{
    /**
     * @param AssetManager $assetManager
     */
    public function __construct(
        private AssetManager $assetManager
    ) {}

    /**
     * {@inheritdoc}
     */
    protected function run(): string
    {
        $this->assetManager->register(HighchartsAssetBundle::class);

        $attributes = [];

        return CustomTag::name('ui-highcharts')->attributes($attributes)->render();
    }

}
