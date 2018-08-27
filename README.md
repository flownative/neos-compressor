[![MIT license](http://img.shields.io/badge/license-MIT-brightgreen.svg)](http://opensource.org/licenses/MIT)
[![Packagist](https://img.shields.io/packagist/v/flownative/neos-compressor.svg)](https://packagist.org/packages/flownative/beach-neos-compressor)
[![Maintenance level: Love](https://img.shields.io/badge/maintenance-%E2%99%A1%E2%99%A1%E2%99%A1-ff69b4.svg)](https://www.flownative.com/en/products/open-source.html)

# Flownative Neos Compressor

This package by default compresses the `head` and `body` of the `Neos.Neos:Page` prototype
using the default compressor of `wyrihaximus/html-compress`.

## Installation

`composer require flownative/neos-compressor`

## Usage

As soon as the package is installed, the `Neos.Neos:Page` prototype is amended with `@process`
instructions on the `head` and `body` elements. This will compress and "regular" output without
any further steps to take.

### Adjust compression

To remove the default compression, simply override:

```
prototype(Neos.Neos:Page) {
    head.@process.compression >
    body.@process.compression >
}
```

To compress specific parts, use the compression helper like this:

```
something.@process.compression = ${Flownative.Compressor.compress(value)}
```
