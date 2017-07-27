<?php

namespace Redirector;

/**
 * Class Redirector
 *
 * A small class to help with redirecting requests from absolute URLs, if required.
 *
 * @package Redirector
 */
class Redirector
{
    /**
     * @var array
     */
    private $redirectList;

    /**
     * @var string
     */
    private $requestUrl;

    /**
     * Initialise the object with the redirect list and requested URL
     *
     * @param array $redirectList
     * @param string $requestUrl
     */
    public function __construct($redirectList = [], $requestUrl)
    {
        $this->redirectList = $redirectList;
        $this->requestUrl = $requestUrl;
    }

    /**
     * Test if the requested URL require a redirect.
     *
     * @return bool
     */
    public function requiresRedirect()
    {
        return (in_array($this->requestUrl, array_keys($this->redirectList)));
    }

    /**
     * Get the URL to redirect to, based on the requested URL, if a redirect is required
     *
     * @return bool|string
     */
    public function getRedirectUrl()
    {
        return ($this->requiresRedirect()) ? $this->redirectList[$this->requestUrl] : false;
    }
}
