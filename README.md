# Phpup: the PHP toolchain

_Phpup_ is a one-file binary with _**zero dependencies**_ that includes Composer and other PHP tools. It also allows to install a per-project PHP based on your `composer.json`.

You don't need to have PHP or anything at all on your system to run it.

> ⚠️ **Under heavy development**   
> Currently, this is an MVP, and only macOS aarch64 is supported.

## Installation

Download `phpup` binary from the release page and put it into a directory on your PATH, so you can simply call `phpup` from any directory.

```bash
sudo mv phpup /usr/local/bin/phpup
```

## Usage

- `phpup list` – See the list of available commands. 
- `phpup composer` – Composer that does not require PHP to be installed.
- `phpup locus` – Installs PHP binary under your project's `vendor/bin/php` based on the requirements in _composer.json_.

## Credits

This package entirely relies on https://github.com/static-php and https://github.com/easysoft/phpmicro. 
