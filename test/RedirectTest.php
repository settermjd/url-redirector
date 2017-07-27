<?php

namespace RedirectorTest;

use PHPUnit\Framework\TestCase;
use Redirector\Redirector;

/**
 * Class RedirectTest
 * @package RedirectorTest
 */
class RedirectTest extends TestCase
{
    /**
     * @dataProvider shouldRedirectData
     * @param array $redirectList
     * @param string $requestUrl
     * @param bool $shouldRedirect
     */
    public function testShouldRedirects($redirectList, $requestUrl, $shouldRedirect)
    {
        $redirector = new Redirector($redirectList, $requestUrl);
        $this->assertSame($shouldRedirect, $redirector->requiresRedirect(), "should require a redirect");
    }

    /**
     * @return array
     */
    public function shouldRedirectData()
    {
        return [
            [
                ['https://www.matthewsetter.com/blog-archive/' => 'https://www.matthewsetter.com/blog/'],
                'https://www.matthewsetter.com/blog-archive/',
                true
            ],
            [
                ['https://www.matthewsetter.com/blog-archive/' => 'https://www.matthewsetter.com/blog/'],
                'https://google.com',
                false
            ],
            [
                ['https://www.matthewsetter.com/blog-archive/' => 'https://www.matthewsetter.com/blog/'],
                'https://www.matthewsetter.com/blog',
                false
            ],
        ];
    }

    /**
     * @dataProvider redirectData
     * @param array $redirectList
     * @param string $requestUrl
     * @param $redirectUrl
     */
    public function testReturnsCorrectRedirectUrl($redirectList, $requestUrl, $redirectUrl)
    {
        $redirector = new Redirector($redirectList, $requestUrl);
        $this->assertSame($redirectUrl, $redirector->getRedirectUrl(), "redirect URL is incorrect");
    }

    /**
     * @return array
     */
    public function redirectData()
    {
        return [
            [
                ['https://www.matthewsetter.com/blog-archive' => 'https://www.matthewsetter.com/blog'],
                'https://www.matthewsetter.com/blog-archive',
                'https://www.matthewsetter.com/blog'
            ],
            [
                ['https://www.matthewsetter.com/blog-archive' => 'https://www.matthewsetter.com/blog'],
                'https://google.com',
                false
            ],
            [
                ['https://www.matthewsetter.com/blog-archive' => 'https://www.matthewsetter.com/blog'],
                'https://www.matthewsetter.com/blog',
                false
            ],
        ];
    }
}
