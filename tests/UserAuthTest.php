<?php
use PHPUnit\Framework\TestCase;
include 'jira.php';

class UserAuthTest extends TestCase
{
    private $http;

    public function setUp()
    {
        $this->http = new Jira;
    }

    public function tearDown() {
        $this->http = null;
    }
    public function testGet()
    {
        $response = $this->http->jira_auth_check();

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json", $contentType);

        $userAgent = json_decode($response->getBody())->{"user-agent"};
        $this->assertRegexp('/Guzzle/', $userAgent);
    }
}