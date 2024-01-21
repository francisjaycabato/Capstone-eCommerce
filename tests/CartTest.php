<?php

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testGetSalesTax()
    {
        // Replace the province value with the province you want to test
        $province = 'qc';
        
        // Mock response expected from the external API
        $mockedResponse = '{"gst": 0.05, "pst": 0.09975}';
        
        // Create a mock for the curl_exec function
        $curlMock = $this->createMock('CurlWrapper');
        
        // Expect curl_exec to be called once and return the mocked response
        $curlMock->expects($this->once())
            ->method('exec')
            ->willReturn($mockedResponse);

        // Replace the actual function with the mock
        $this->setCurlWrapper($curlMock);

        // Call the function
        $salesTax = getSalesTax($province);

        // Assert that the function returns the expected sales tax
        $this->assertEquals(['gst' => 0.05, 'pst' => 0.09975], $salesTax);
    }
}
