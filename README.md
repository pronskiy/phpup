<h1 align="center">
    <code lang="html">phpup</code><br>The PHP Toolchain
</h1>

_Phpup_ is a single-file binary with _**zero dependencies**_ that includes Composer and other PHP tools. It also allows installing a per-project PHP based on your `composer.json`.

You don't need to have PHP or anything at all on your system to run it.

> [!WARNING]
> **Under heavy development**  
> Currently, this is an MVP, and only macOS aarch64 is supported.

## Installation

Download `phpup` binary from the release page and put it into a directory on your PATH, so you can simply call `phpup` from any directory.

```bash
curl -OL https://github.com/pronskiy/phpup/releases/latest/download/phpup
chmod +x phpup
sudo mv phpup /usr/local/bin/phpup
```

## Usage

- `phpup list` – See the list of available commands.
- `phpup <file>` – Run any php file. 🚧
- `phpup composer` – Composer that does not require PHP to be installed.
- `phpup conductor <command>` – Like npx but for PHP. 🚧
- `phpup locus` – Installs PHP binary under your project's `vendor/bin/php` based on the requirements in _composer.json_.

- ~~`phpup phpstan` – PHPStan that does not require PHP. 🚧~~
- ~~`phpup rector` – Rector that does not require PHP. 🚧~~

## Contributing

Contributions are very welcome! However, it's recommended to first create an issue describing the idea — let's find the best approach together.

See some ideas in the todo list below.

### Build Requirements

Before you begin, ensure you have met the following requirements:

- [Make](https://www.gnu.org/software/make/) (version 3.0 or later)
- [Box](https://github.com/box-project/box) (version 4.x)

Building Binary

```shell
make build
```

### TODO

- [x] Run php script [https://github.com/pronskiy/phpup/issues/1](https://github.com/pronskiy/phpup/issues/1)

- [ ] Accept a reference to a packagist/gh repo, to be able to run its scripts/bin/
  - [https://twitter.com/AdrienBrault/status/1782476060426179049](https://twitter.com/AdrienBrault/status/1782476060426179049)
  - [https://twitter.com/pronskiy/status/1768219585151402251](https://twitter.com/pronskiy/status/1768219585151402251)
  - [https://github.com/artisan-build/conductor](https://github.com/artisan-build/conductor)
  - [https://github.com/pronskiy/conductor](https://github.com/pronskiy/conductor)
  - [https://github.com/artisan-build/conductor/issues/8](https://github.com/artisan-build/conductor/issues/8)

- [ ] Support Windows
- [ ] Support Linux

- [ ] Make symfony/console app
- [ ] Add help command

- [ ] Extract packing with box and micro php to a stand-alone GitHub action
- [ ] Reduce size of the resulting binary
- [ ] Check microphp's [patches](https://github.com/easysoft/phpmicro/blob/master/patches/Readme.md):
  - [ ] Bypass cli SAPI name checks
  - [ ] static_opcache

- ~~[ ] Add more tools~~
  - ~~[ ] PHP-CS-Fixer~~
  - ~~[ ] PHPUnit~~
- ~~[ ] Support Rector 🚧~~
- ~~[ ] Support PHPStan 🚧~~

## Credits

This package entirely relies on [https://github.com/static-php](https://github.com/static-php) and [https://github.com/easysoft/phpmicro](https://github.com/easysoft/phpmicro).
