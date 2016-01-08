<?php

namespace HttpMessagesCommerceMiddleware\Transformers;

use Craft\Commerce_CustomerModel;

class CustomerTransformer extends BaseTransformer
{
    /**
     * Transform
     *
     * @param Commerce_CustomerModel $element Commerce Customer
     *
     * @return array Commerce Customer
     */
    public function transform(Commerce_CustomerModel $element)
    {
        return [
            'id'                        => (int) $element->id,
            'userId'                    => (int) $element->userId,
            'email'                     => $element->email,
            'lastUsedBillingAddressId'  => (int) $element->lastUsedBillingAddressId,
            'lastUsedShippingAddressId' => (int) $element->lastUsedShippingAddressId,
        ];
    }
}
