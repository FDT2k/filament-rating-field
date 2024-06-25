
<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{
        state: $wire.{{ $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')') }},
        clickHandler($event) {
            let disabled = {{ $isDisabled() ? 'true' : 'false' }};
            if(disabled){
                return;
            }
            
            let target = $event.target.dataset.index ?  $event.target : $event.target.closest('.rating-item');
            let index = target.dataset.index || false;
            this.state = index;
            this.draw(index);
        },
        draw(index) {
            let tag1 = $refs['{{$getRefId('defaultIcon')}}'].getElementsByTagName('svg')[0];
            this.redraw(tag1, {{ $getMaxValue() }});
            let tag2 = $refs['{{$getRefId('selectedIcon')}}'].getElementsByTagName('svg')[0];
            this.redraw(tag2, index);
        },
        redraw(templateTag, maxItems) {

            for(let i=1; i <= maxItems; i++) {
                if(!$refs['{{$getRefId('ratingIcons')}}_' + i]) {
                    continue;
                }

                let ratingTag = $refs['{{$getRefId('ratingIcons')}}_' + i].getElementsByTagName('svg')[0];

                while(ratingTag.attributes.length > 0){
                    ratingTag.removeAttribute(ratingTag.attributes[0].name);
                }

                Array.from(templateTag.attributes).forEach(attribute => {
                    ratingTag.setAttribute(
                        attribute.nodeName === 'id' ? 'data-id' : attribute.nodeName,
                        attribute.nodeValue,
                    );
                });

                ratingTag.innerHTML = templateTag.innerHTML;
            }
        },
        mouseoverHandler($event) {
            @if($isDisabled() || !$hasEffects())
                return;
            @else
                $event.stopPropagation();
                $event.preventDefault();
                let target = $event.target.dataset.index ?  $event.target : $event.target.closest('.rating-item');
                let index = target.dataset.index || false;

                if(!index) {
                    return;
                }

                this.draw(index);
            @endif
        },
        mouseleaveHandler($event) {
            @if($isDisabled() || !$hasEffects())
                return;
            @else
                $event.stopPropagation();
                $event.preventDefault();
                let index = this.state || 0;
                this.draw(index);
            @endif
        },
        clearHandler($event) {
            @if($isDisabled() || !$hasEffects())
                return;
            @else
                this.state = null;
                this.draw(this.state);
            @endif
        }
    }">
        <div class="hidden">
            <div x-ref="{{$getRefId('defaultIcon')}}">
                @include('filament-rating-field::forms.components._rating-item', [
                    'component' => $getIcon(),
                ])
            </div>
            <div x-ref="{{$getRefId('selectedIcon')}}">
                @include('filament-rating-field::forms.components._rating-item', [
                    'component' => $getSelectedIcon(),
                ])
            </div>
        </div>
        <ul class="ml-auto flex">
        @for ($i = $getMinValue(); $i <= $getMaxValue(); $i++)
            <li
                class="rating-item"
                x-on:mouseenter="mouseoverHandler"
                x-on:mouseleave="mouseleaveHandler"
                data-index="{{ $i }}"
                x-tooltip.raw="{{ $getTooltip($i) }}"
                x-ref="{{$getRefId('ratingIcons', $i)}}">
                @include('filament-rating-field::forms.components._rating-item', [
                    'component' => $i <= $getState() ? $getSelectedIcon() : $getIcon(),
                ])
            </li>
        @endfor
            @if($isClearable())
            <li>
                <x-dynamic-component
                    x-on:click="clearHandler"
                    :component="$getClearIcon()"
                    :x-tooltip.raw="$getClearIconTooltip()"
                    style="color: {{$getClearIconColorStyle()}}"
                    class="mr-2 ml-1 rtl:ml-2 rtl:-mr-1 flex-shrink-0 {{ $getSizeClass() }} {{ $getCursorClass() }}"
                />
            </li>
            @endif
        </ul>
    </div>
</x-dynamic-component>
