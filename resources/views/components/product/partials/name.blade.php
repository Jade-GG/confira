<div {{ $attributes->class('flex flex-col items-start') }}>
    <a class="hover:underline" :href="item.product.url_key + item.product.url_suffix | url">
        <div class="font-semibold text-sm" dusk="cart-item-name">@{{ item.product.name }}</div>
    </a>
    <div class="flex flex-wrap *:border-r -mx-2 *:px-2 text-inactive text-xs subpixel-antialiased mt-2 *:mb-2 *:leading-3">
        <div v-for="option in item.configurable_options">
                @{{ option.value_label }}
            </div>
        <div v-for="option in item.customizable_options">
            @{{ option.label }}: @{{ option.values[0].label || option.values[0].value }}
        </div>
        <div v-for="option in config.cart_attributes">
            <template v-if="item.product.attribute_values?.[option] && typeof item.product.attribute_values[option] === 'object'">
                @{{ option }}: <span v-html="item.product.attribute_values[option]?.join(', ')"></span>
            </template>
        </div>
    </div>
</div>
