<?php

namespace Yepsua\Filament\Forms\Components;

use Closure;
use Filament\Forms\Components\Field;
use Yepsua\Filament\Concerns\HasColor;
use Yepsua\Filament\Concerns\HasCursor;
use Yepsua\Filament\Concerns\HasDimensions;
use Yepsua\Filament\Concerns\HasEffect;
use Yepsua\Filament\Concerns\HasIcon;
use Yepsua\Filament\Concerns\HasTooltip;
use Yepsua\Filament\Concerns\HasValueRange;
use Yepsua\Filament\Concerns\IsCleearable;

/**
 * Rating field for the Filament forms
 */
class Rating extends Field
{
    use HasColor;
    use HasCursor;
    use HasDimensions;
    use HasEffect;
    use HasIcon;
    use HasTooltip;
    use HasValueRange;
    use IsCleearable;
   
    protected string $view = "filament-rating-field::forms.components.rating";



    public function getRefId(string $prefix, ?string $suffix = null): string
    {
        return sprintf('%s_%s%s', str_replace('.', '_', $this->getId()), $prefix, $suffix ? '_' . $suffix : '');
    }

}
