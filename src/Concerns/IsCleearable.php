<?php

namespace Yepsua\Filament\Concerns;

trait IsCleearable{
   
    protected bool | Closure $clearable = false;
    protected string $clearIcon = "heroicon-s-x-circle";
    protected string $clearIconColor = " #EF4444 ";

    public function isClearable(): bool
    {
        return $this->evaluate($this->clearable);
    }

    public function clearIconColor(string $clearIconColor): self
    {
        $this->clearIconColor = $clearIconColor;

        return $this;
    }


    public function clearable(bool | Closure $clearable = true): self
    {
        $this->clearable = $clearable;

        return $this;
    }

    public function getClearIconColorStyle(): string
    {
        return $this->isDisabled()
            ? $this->getDisabledColor()
            : $this->getClearIconColor();
    }

    public function clearIcon(string $clearIcon): self
    {
        $this->clearIcon = $clearIcon;

        return $this;
    }


    public function getClearIconColor(): string
    {
        return $this->clearIconColor;
    }

    public function getClearIconTooltip(): string
    {
        return $this->clearIconTooltip;
    }

    public function getClearIcon(): string
    {
        return $this->evaluate($this->clearIcon);
    }
}