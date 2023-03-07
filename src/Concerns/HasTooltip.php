<?php

namespace Yepsua\Filament\Concerns;

trait HasTooltip{
    protected string $clearIconTooltip = "";
    protected array $tooltips = [];


    public function clearIconTooltip(string $clearIconTooltip): self
    {
        $this->clearIconTooltip = $clearIconTooltip;

        return $this;
    }

    public function getTooltip(int $index): mixed
    {
        return $this->tooltips[$index - 1] ?? '';
    }

}