<?php

namespace mvd\Vipps\Tests\Unit\Resource;

use mvd\Vipps\Resource\AuthorizedResourceBase;

class AuthorizedResourceBaseTest extends ResourceTestBase
{

    /**
     * @covers \mvd\Vipps\Resource\AuthorizedResourceBase::__construct()
     */
    public function testAuthorizationHeader()
    {
        /** @var \mvd\Vipps\Resource\AuthorizedResourceBase $authorized */
        $authorized = $this->getMockForAbstractClass(AuthorizedResourceBase::class, [
            $this->vipps,
            'test_subscription_key'
        ]);
        $this->assertArrayHasKey('Authorization', $authorized->getHeaders());
        $this->assertEquals('test_token_type test_access_token', $authorized->getHeaders()['Authorization']);
    }
}
