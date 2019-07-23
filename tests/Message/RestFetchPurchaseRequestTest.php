<?php

namespace Petcircle\PayPal\Message;

use Omnipay\Tests\TestCase;

class RestFetchPurchaseRequestTest extends TestCase
{
    /** @var \Petcircle\PayPal\Message\RestFetchPurchaseRequest */
    private $request;

    public function setUp()
    {
        $client = $this->getHttpClient();
        $request = $this->getHttpRequest();
        $this->request = new RestFetchPurchaseRequest($client, $request);
    }

    public function testEndpoint()
    {
        $this->request->setTransactionReference('ABC-123');
        $this->assertStringEndsWith('/payments/payment/ABC-123', $this->request->getEndpoint());
    }
}
