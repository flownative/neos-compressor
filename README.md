# Flownative Neos Compressor

This package by default compresses the `head` and `body` of the `TYPO3.Neos:Page` prototype
using the default compressor of `wyrihaximus/html-compress`.

## Installation

`composer require flownative/neos-compressor`

## Usage

As soon as the package is installed, the `TYPO3.Neos:Page` prototype is amended with `@process`
instructions on the `head` and `body` elements. This will compress and "regular" output without
any further steps to take.

### Adjust compression

To remove the default compression, simply override:

```
prototype(TYPO3.Neos:Page) {
    head.@process.compression >
    body.@process.compression >
}
```

To compress specific parts, use the compression helper like this:

```
something.@process.compression = ${Flownative.Compressor.compress(value)}
```
