<?php

namespace HttpMessagesCommerceMiddleware\Transformers;

use Craft\Commerce_ProductModel;

class ProductTransformer extends BaseTransformer
{
    /**
     * Transform
     *
     * @param Commerce_ProductModel $element Commerce Product
     *
     * @return array Commerce Product
     */
    public function transform(Commerce_ProductModel $element)
    {
        \Craft\Craft::dd($element);

        return [
            'id'                        => (int) $element->id,
            'userId'                    => (int) $element->userId,
            'email'                     => $element->email,
            'lastUsedBillingAddressId'  => (int) $element->lastUsedBillingAddressId,
            'lastUsedShippingAddressId' => (int) $element->lastUsedShippingAddressId,
        ];
    }
}
