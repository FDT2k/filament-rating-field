<?php

namespace Yepsua\Filament\Concerns;

trait HasIcon{
    protected string | Closure $icon = "heroicon-o-star";
    protected string | Closure $selectedIcon = "heroicon-s-star";


    public function icons(string $icon, string $solidIcon): self
    {
        $this->icon($icon);
        $this->selectedIcon($solidIcon);

        return $this;
    }

    public function icon(string | Closure $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function selectedIcon(string | Closure $selectedIcon): self
    {
        $this->selectedIcon = $selectedIcon;

        return $this;
    }


    public function getIcon(): string
    {
        return $this->evaluate($this->icon);
    }

    public function getSelectedIcon(): string
    {
        return $this->evaluate($this->selectedIcon);
    }

}