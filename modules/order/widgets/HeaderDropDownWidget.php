<?php

namespace app\modules\order\widgets;

use yii\base\Widget;
use yii\helpers\Url;

class HeaderDropDownWidget extends TabsWidget
{
    /** @var string */
    public $title;

    /** @var string */
    public $column;

    /** @var array */
    public $choices;

    public function run()
    {
        echo '<div class="dropdown-th"><div class="dropdown">';
        echo $this->renderHeader();
        echo $this->renderDropDown();
        echo '</div></div>';
    }

    public function renderHeader()
    {
        echo '<button class="btn btn-th btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            ' . $this->title . '<span class="caret"></span></button>';
    }

    public function renderDropDown()
    {
        echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">';
        foreach ($this->choices as $value => $title) {
            $href = Url::current([$this->column => $value]);
            echo '<li ' . $this->getActiveClass($value) . ">
                    <a href='$href'>$title</a>
                  </li>";
        }
        echo '</ul>';
    }

}