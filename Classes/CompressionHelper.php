<?php
namespace Flownative\Neos\Compressor;

use Neos\Eel\ProtectedContextAwareInterface;
use Neos\Flow\Annotations as Flow;
use WyriHaximus\HtmlCompress\Factory;
use WyriHaximus\HtmlCompress\Parser;

class CompressionHelper implements ProtectedContextAwareInterface
{
    /**
     * @var Parser
     */
    protected $parser;

    /**
     * CompressionHelper constructor.
     */
    public function __construct()
    {
        $this->parser = Factory::construct();
    }

    /**
     * Run the value through the compressor.
     *
     * @param string $content
     *
     * @return string
     */
    public function compress($content)
    {
        return $this->parser->compress($content);
    }

    /**
     * All methods are considered safe, i.e. can be executed from within Eel
     *
     * @param string $methodName
     *
     * @return boolean
     */
    public function allowsCallOfMethod($methodName)
    {
        return true;
    }
}
