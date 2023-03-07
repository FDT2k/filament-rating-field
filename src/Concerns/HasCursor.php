<?php

namespace Yepsua\Filament\Concerns;

trait HasCursor{
   
    protected string $cursor = 'pointer';
    protected string $disabledCursor = 'not-allowed';

    public function cursor(string $cursor): self
    {
        $this->cursor = $cursor;

        return $this;
    }

    public function disabledCursor(string $disabledCursor): self
    {
        $this->disabledCursor = $disabledCursor;

        return $this;
    }


    public function getCursor(): string
    {
        return $this->cursor;
    }

    public function getDisabledCursor(): string
    {
        return $this->disabledCursor;
    }


    public function getCursorClass(): string
    {
        return $this->isDisabled()
            ? sprintf("cursor-%s", $this->getDisabledCursor())
            : sprintf("cursor-%s", $this->getCursor());
    }
}