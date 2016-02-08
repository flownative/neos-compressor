<?php
namespace Flownative\Neos\Compressor;

use TYPO3\Eel\ProtectedContextAwareInterface;
use TYPO3\Flow\Annotations as Flow;
use WyriHaximus\HtmlCompress\Factory;

class CompressionHelper implements ProtectedContextAwareInterface
{

    /**
     * @var \WyriHaximus\HtmlCompress\Parser
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
     * @param $content string
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
     * @return boolean
     */
    public function allowsCallOfMethod($methodName)
    {
        return true;
    }

}