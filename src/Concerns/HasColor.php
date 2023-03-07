<?php

namespace Yepsua\Filament\Concerns;

trait HasColor{
    protected string $color = "#EAB308";
    protected string $disabledColor = "#6B7280";

    public function color(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function disabledColor(string $disabledColor): self
    {
        $this->disabledColor = $disabledColor;

        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getDisabledColor(): string
    {
        return $this->disabledColor;
    }

    public function getFinalColorStyle(): string
    {
        return $this->isDisabled()
            ? $this->getDisabledColor()
            : $this->getColor();
    }
}