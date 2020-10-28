<?php

namespace mvd\Vipps\Model\Payment;

use mvd\Vipps\Model\FromStringInterface;
use mvd\Vipps\Model\FromStringTrait;
use mvd\Vipps\Model\ToStringInterface;
use mvd\Vipps\Model\ToStringTrait;
use mvd\Vipps\Model\SupportsSerializationInterface;
use JMS\Serializer\Annotation as Serializer;

class FetchShippingCostAndMethod implements FromStringInterface, ToStringInterface, SupportsSerializationInterface
{
    use FromStringTrait;
    use PaymentSerializationTrait;
    use ToStringTrait;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    protected $addressId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $addressLine1;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $addressLine2;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $city;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $country;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    protected $postCode;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    protected $postalCode;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $addressType;

    /**
     * @return int
     */
    public function getAddressId()
    {
        return $this->addressId;
    }

    /**
     * @param int $addressId
     *
     * @return $this
     */
    public function setAddressId($addressId)
    {
        $this->addressId = $addressId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @param string $addressLine1
     *
     * @return $this
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @param string $addressLine2
     *
     * @return $this
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return int
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * @param int $postCode
     *
     * @return $this
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param int $postalCode
     *
     * @return $this
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressType()
    {
        return $this->addressType;
    }

    /**
     * @param string $addressType
     *
     * @return $this
     */
    public function setAddressType($addressType)
    {
        $this->addressType = $addressType;
        return $this;
    }
}
