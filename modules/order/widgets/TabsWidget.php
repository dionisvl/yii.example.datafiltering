<?php

namespace app\modules\order\widgets;

use app\modules\order\helpers\UrlHelper;
use yii\base\Widget;

class TabsWidget extends Widget
{
    /** @var string */
    public $column;

    /** @var string */
    public $rootTitle;

    /** @var array */
    public $choices;

    protected $activeChoiceIndex = null;

    public function init()
    {
        parent::init();
        $this->setActiveTabIndex();
    }

    private function setActiveTabIndex(): void
    {
        foreach ($this->choices as $value => $title) {
            if (UrlHelper::isCurrentHasQueryParamWithValue($this->column, $value)) {
                $this->activeChoiceIndex = $value;
                break;
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function run()
    {
        if ($this->rootTitle) {
            echo '<li ' . $this->getActiveClass() . '>
                    <a href="/">' . $this->rootTitle . '</a>
                  </li>';
        }
        foreach ($this->choices as $value => $title) {
            $href = '/?' . $this->column . '=' . $value;
            echo '<li ' . $this->getActiveClass($value) . '>
                    <a href="' . $href . '">' . $title . '</a>
                  </li>';
        }
    }

    /**
     * @param $tabIndex
     * @return string
     */
    protected function getActiveClass($tabIndex = null): string
    {
        if (is_null($tabIndex) && is_null($this->activeChoiceIndex)) {
            return 'class = "active"';
        }
        return $tabIndex === $this->activeChoiceIndex ? 'class = "active"' : '';
    }
}