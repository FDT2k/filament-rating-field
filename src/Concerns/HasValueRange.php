<?php

namespace Yepsua\Filament\Concerns;

trait HasValueRange{
    protected int | Closure $minValue = 1;
    protected int | Closure $maxValue = 5;

    public function getMinValue(): int
    {
        return $this->evaluate($this->minValue);
    }

    public function getMaxValue(): int
    {
        return $this->evaluate($this->maxValue);
    }


    public function minValue(int | Closure $minValue): self
    {
        $this->minValue = $minValue;

        return $this;
    }

    public function maxValue(int | Closure $maxValue): self
    {
        $this->maxValue = $maxValue;

        return $this;
    }

    public function options(array | Closure $options): self
    {
        if (is_callable($options)) {
            $options = $options();
        }
        $this->min(1);
        $this->max(sizeof($options));
        $this->tooltips = [];

        foreach ($options as $option) {
            $this->tooltips[] = $option;
        }

        return $this;
    }

}