<?php

namespace Tests\Unit;

use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_homepage()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }

    public function test_Monitoring_Truk()
    {
        $response = $this->call('GET', '/monitoring-truk');
        $this->assertEquals(200, $response->status());
    }

    public function test_Monitoring_Sampah()
    {
        $response = $this->call('GET', '/monitoring-sampah');
        $this->assertEquals(200, $response->status());
    }

    public function test_Admin()
    {
        $response = $this->call('GET', '/admin');
        $this->assertEquals(200, $response->status());
    }

    public function test_login()
    {
        $response = $this->call('GET', '/login');
        $this->assertEquals(200, $response->status());
    }

    public function test_logout()
    {
        $response = $this->call('GET', '/logout');
        $this->assertEquals(200, $response->status());
    }

    public function test_ajax_bin()
    {
        $response = $this->call('GET', '/ajax/tempat-sampah');
        $this->assertEquals(200, $response->status());
    }

    public function test_ajax_location_bin()
    {
        $response = $this->call('GET', '/ajax/tempat-sampah-location');
        $this->assertEquals(200, $response->status());
    }

    public function test_LogSampah()
    {
        $response = $this->call('GET', '/LogSampah');
        $this->assertEquals(200, $response->status());
    }

    public function test_RuteTercepat()
    {
        $response = $this->call('GET', '/RuteTercepat');
        $this->assertEquals(200, $response->status());
    }

    public function test_Registration()
    {
        $response = $this->call('GET', '/registration');
        $this->assertEquals(200, $response->status());
    }

    public function test_AddTruk()
    {
        $response = $this->call('GET', '/monitoring-truk/addTruk');
        $this->assertEquals(200, $response->status());
    }

    public function test_AddBin()
    {
        $response = $this->call('GET', '/monitoring-sampah/addTempatSampah');
        $this->assertEquals(200, $response->status());
    }
}
