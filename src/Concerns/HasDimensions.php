<?php

namespace Yepsua\Filament\Concerns;

use Closure;

trait HasDimensions{
   /* protected int | Closure $width = 6;
    protected int | Closure $height = 6;

  
    public function width(int | Closure $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function height(int | Closure $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function size(int | Closure $size): self
    {
        $this->width = $size;
        $this->height = $size;

        return $this;
    }

    public function getWidth(): int
    {
        return $this->evaluate($this->width);
    }

    public function getHeight(): int
    {
        return $this->evaluate($this->height);
    }

    public function getSizeClass(): string
    {
        return sprintf('w-%s h-%s', $this->getWidth(), $this->getHeight());
    }*/
    public function getSizeClass(): string
    {
        return sprintf('w-%s h-%s', 5,5);
    }
}