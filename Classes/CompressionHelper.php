<?php
declare(strict_types=1);

namespace Flownative\Neos\Compressor;

use Neos\Eel\ProtectedContextAwareInterface;
use voku\helper\HtmlMin;
use WyriHaximus\HtmlCompress\Factory;
use WyriHaximus\HtmlCompress\HtmlCompressorInterface;

class CompressionHelper implements ProtectedContextAwareInterface
{
    /**
     * @var HtmlCompressorInterface
     */
    protected $compressor;

    /**
     * CompressionHelper constructor.
     */
    public function __construct()
    {
        $htmlMin = new HtmlMin();
        // TODO this makes it not break the cache markers, but compresses less (or not at all?)
        $htmlMin->doOptimizeViaHtmlDomParser(false);
        $this->compressor = Factory::constructSmallest()->withHtmlMin($htmlMin);
    }

    /**
     * Run the value through the compressor.
     *
     * @param string $content
     * @return string
     */
    public function compress(string $content): string
    {
        return $this->compressor->compress($content);
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
