<?php

namespace Mailery\Widget\Highcharts;

use Mailery\Widget\Highcharts\HighchartsAssetBundle;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Html\Tag\CustomTag;
use Yiisoft\Widget\Widget;

class Highcharts extends Widget
{
    /**
     * @var array
     */
    private array $attributes = [];

    /**
     * @param AssetManager $assetManager
     */
    public function __construct(
        private AssetManager $assetManager
    ) {}

    /**
     * @param array $options
     * @return self
     */
    public function options(array $options): self
    {
        $new = clone $this;
        $new->attributes[':options'] = $options;
        return $new;
    }

    /**
     * {@inheritdoc}
     */
    protected function run(): string
    {
        $this->assetManager->register(HighchartsAssetBundle::class);

        return CustomTag::name('ui-highcharts')->attributes($this->attributes)->render();
    }

}
