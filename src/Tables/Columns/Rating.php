<?php

namespace Yepsua\Filament\Tables\Columns;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\Contracts\Editable;
use Filament\Tables\Columns\Concerns;
use Closure;
use Yepsua\Filament\Concerns\HasColor;
use Yepsua\Filament\Concerns\HasCursor;
use Yepsua\Filament\Concerns\HasDimensions;
use Yepsua\Filament\Concerns\HasEffect;
use Yepsua\Filament\Concerns\HasIcon;
use Yepsua\Filament\Concerns\HasTooltip;
use Yepsua\Filament\Concerns\HasValueRange;
use Yepsua\Filament\Concerns\IsCleearable;

class Rating extends Column implements Editable
{
    use Concerns\CanBeValidated;
    use Concerns\CanUpdateState;

    use HasValueRange;
    use HasColor;
    use HasCursor;
    use HasDimensions;
    use HasEffect;
    use HasIcon;
    use IsCleearable;
    protected string $view = "filament-rating-field::tables.columns.rating";


    public function getRefId(string $prefix, ?string $suffix = null): string
    {
        return sprintf('%s_%s%s', str_replace('.', '_', $this->getName()), $prefix, $suffix ? '_' . $suffix : '');
    }

}
