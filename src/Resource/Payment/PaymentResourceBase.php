<?php

namespace mvd\Vipps\Resource\Payment;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;
use mvd\Vipps\Resource\AuthorizedResourceBase;
use mvd\Vipps\Resource\RequestIdFactory;

/**
 * Class PaymentResourceBase
 *
 * @package Vipps\Resource\Payment
 */
abstract class PaymentResourceBase extends AuthorizedResourceBase
{

    /**
     * {@inheritdoc}
     */
    public function __construct(\mvd\Vipps\VippsInterface $vipps, $subscription_key)
    {
        parent::__construct($vipps, $subscription_key);

        // Adjust serializer.
        $this->serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()))
            ->build();

        // Content type for all requests must be set.
        $this->headers['Content-Type'] = 'application/json';

        // By default RequestID is different for each Resource object.
        $this->headers['X-Request-Id'] = RequestIdFactory::generate();

        // Timestamp is equal to current DateTime.
        $this->headers['X-TimeStamp'] = (new \DateTime())->format(\DateTime::ISO8601);
    }
}
