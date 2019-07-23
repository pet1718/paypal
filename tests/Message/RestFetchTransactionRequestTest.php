<?php

namespace Petcircle\PayPal\Message;

use Omnipay\Tests\TestCase;

class RestFetchTransactionRequestTest extends TestCase
{
    /** @var \Petcircle\PayPal\Message\RestFetchTransactionRequest */
    private $request;

    public function setUp()
    {
        $client = $this->getHttpClient();
        $request = $this->getHttpRequest();
        $this->request = new RestFetchTransactionRequest($client, $request);
    }

    public function testGetData()
    {
        $this->request->setTransactionReference('ABC-123');
        $data = $this->request->getData();
        $this->assertEquals(array(), $data);
    }

    public function testEndpoint()
    {
        $this->request->setTransactionReference('ABC-123');
        $this->assertStringEndsWith('/payments/sale/ABC-123', $this->request->getEndpoint());
    }
}
