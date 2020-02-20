<?php
declare(strict_types=1);

namespace Flownative\Neos\Compressor;

use Neos\Eel\ProtectedContextAwareInterface;
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
        $this->compressor = Factory::construct();
    }

    /**
     * Run the value through the compressor.
     *
     * @param string $content
     *
     * @return string
     */
    public function compress($content): string
    {
        return $this->compressor->compress($content);
    }

    /**
     * All methods are considered safe, i.e. can be executed from within Eel
     *
     * @param string $methodName
     *
     * @return bool
     */
    public function allowsCallOfMethod($methodName): bool
    {
        return true;
    }
}
