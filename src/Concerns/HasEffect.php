<?php

namespace Yepsua\Filament\Concerns;

trait HasEffect{
    protected bool | Closure $effects = true;
   
    public function effects(bool | Closure $effects = true): self
    {
        $this->effects = $effects;

        return $this;
    }




    public function hasEffects(): bool
    {
        return $this->evaluate($this->effects);
    }


}