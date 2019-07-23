<?php

namespace Petcircle\PayPal\Message;

use Omnipay\Tests\TestCase;
use Petcircle\PayPal\RestGateway;

class RestSuspendSubscriptionRequestTest extends TestCase
{
    /** @var \Petcircle\PayPal\Message\RestSuspendSubscriptionRequest */
    private $request;

    public function setUp()
    {
        $client = $this->getHttpClient();
        $request = $this->getHttpRequest();
        $this->request = new RestSuspendSubscriptionRequest($client, $request);

        $this->request->initialize(array(
            'transactionReference'  => 'ABC-123',
            'description'           => 'Suspend this subscription',
        ));
    }

    public function testGetData()
    {
        $data = $this->request->getData();
        $this->assertEquals('Suspend this subscription', $data['note']);
    }
}
