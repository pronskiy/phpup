#!/bin/bash
set -e

rm -rf ./build/phpup
rm -rf ./build/index.*

box compile
mkdir -p ./build
mv index.phar ./build/

# Detect OS and architecture
if [[ "$OSTYPE" == "darwin"* ]]; then
    OS="macos"
    if [[ $(uname -m) == "arm64" ]]; then
        ARCH="aarch64"
    else
        ARCH="x86_64"
    fi
elif [[ "$OSTYPE" == "linux-gnu"* ]]; then
    OS="linux"
    if [[ $(uname -m) == "aarch64" ]]; then
        ARCH="aarch64"
    else
        ARCH="x86_64"
    fi
else
    echo "Unsupported operating system"
    exit 1
fi

# Construct the download URL
PHP_VERSION="8.3.6"
DOWNLOAD_URL="https://dl.static-php.dev/static-php-cli/common/php-${PHP_VERSION}-micro-${OS}-${ARCH}.tar.gz"

# Download and extract
cd build || exit
echo "Downloading from: $DOWNLOAD_URL"
curl -L -O "$DOWNLOAD_URL"
tar -xvf "php-${PHP_VERSION}-micro-${OS}-${ARCH}.tar.gz"
cat ./micro.sfx ./index.phar >./phpup && chmod 0755 ./phpup
