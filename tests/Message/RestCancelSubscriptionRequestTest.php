<?php

namespace Petcircle\PayPal\Message;

use Omnipay\Tests\TestCase;
use Petcircle\PayPal\RestGateway;

class RestCancelSubscriptionRequestTest extends TestCase
{
    /** @var \Petcircle\PayPal\Message\RestCancelSubscriptionRequest */
    private $request;

    public function setUp()
    {
        $client = $this->getHttpClient();
        $request = $this->getHttpRequest();
        $this->request = new RestCancelSubscriptionRequest($client, $request);

        $this->request->initialize(array(
            'transactionReference'  => 'ABC-123',
            'description'           => 'Cancel this subscription',
        ));
    }

    public function testGetData()
    {
        $data = $this->request->getData();
        $this->assertEquals('Cancel this subscription', $data['note']);
    }
}
