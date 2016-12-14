<?php

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-01-29 at 11:06:54.
 */
class JGithubPackageIssuesEventsTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var    JRegistry  Options for the GitHub object.
	 * @since  11.4
	 */
	protected $options;

	/**
	 * @var    JGithubHttp  Mock client object.
	 * @since  11.4
	 */
	protected $client;

	/**
	 * @var    JHttpResponse  Mock response object.
	 * @since  12.3
	 */
	protected $response;

	/**
	 * @var JGithubPackageIssuesEvents
	 */
	protected $object;

	/**
	 * @var    string  Sample JSON string.
	 * @since  12.3
	 */
	protected $sampleString = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

	/**
	 * @var    string  Sample JSON error message.
	 * @since  12.3
	 */
	protected $errorString = '{"message": "Generic Error"}';

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->options = new JRegistry;
		$this->client = $this->getMockBuilder('JGithubHttp')->setMethods(array('get', 'post', 'delete', 'patch', 'put'))->getMock();
		$this->response = $this->getMockBuilder('JHttpResponse')->getMock();

		$this->object = new JGithubPackageIssuesEvents($this->options, $this->client);
	}

	/**
	 * @covers JGithubPackageIssuesEvents::getList
	 *
	 * GET /repos/:owner/:repo/issues/:issue_number/events
	 *
	 * Response
	 *
	 * Status: 200 OK
	 * Link: <https://api.github.com/resource?page=2>; rel="next",
	 * <https://api.github.com/resource?page=5>; rel="last"
	 * X-RateLimit-Limit: 5000
	 * X-RateLimit-Remaining: 4999
	 */
	public function testGetList()
	{
		$this->response->code = 200;
		$this->response->body = $this->sampleString;

		$this->client->expects($this->once())
		             ->method('get')
		             ->with('/repos/joomla/joomla-platform/issues/1/events', 0, 0)
		             ->will($this->returnValue($this->response))
		;

		$this->assertThat(
			$this->object->getList('joomla', 'joomla-platform', '1'),
			$this->equalTo(json_decode($this->response->body))
		)
		;
	}

	/**
	 * @covers JGithubPackageIssuesEvents::getListRepository
	 *
	 * GET /repos/:owner/:repo/issues/events
	 *
	 * Response
	 *
	 * Status: 200 OK
	 * Link: <https://api.github.com/resource?page=2>; rel="next",
	 * <https://api.github.com/resource?page=5>; rel="last"
	 * X-RateLimit-Limit: 5000
	 * X-RateLimit-Remaining: 4999
	 */
	public function testGetListRepository()
	{
		$this->response->code = 200;
		$this->response->body = $this->sampleString;

		$this->client->expects($this->once())
		             ->method('get')
		             ->with('/repos/joomla/joomla-platform/issues/1/comments', 0, 0)
		             ->will($this->returnValue($this->response))
		;

		$this->assertThat(
			$this->object->getListRepository('joomla', 'joomla-platform', '1'),
			$this->equalTo(json_decode($this->response->body))
		)
		;
	}

	/**
	 * @covers JGithubPackageIssuesEvents::get
	 *
	 * GET /repos/:owner/:repo/issues/events/:id
	 *
	 * Response
	 *
	 * Status: 200 OK
	 * X-RateLimit-Limit: 5000
	 * X-RateLimit-Remaining: 4999
	 */
	public function testGet()
	{
		$this->response->code = 200;
		$this->response->body = $this->sampleString;

		$this->client->expects($this->once())
		             ->method('get')
		             ->with('/repos/joomla/joomla-platform/issues/events/1', 0, 0)
		             ->will($this->returnValue($this->response))
		;

		$this->assertThat(
			$this->object->get('joomla', 'joomla-platform', '1'),
			$this->equalTo(json_decode($this->response->body))
		)
		;
	}
}