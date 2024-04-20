rm -rf ./build/*     
box compile
mkdir -p ./build
mv index.phar ./build/

#rm -rf ./tmp/*
#cd tmp || exit
#curl -O https://dl.static-php.dev/static-php-cli/common/php-8.3.3-micro-macos-aarch64.tar.gz
#tar -xvf php-8.3.3-micro-macos-aarch64.tar.gz
#cd ..

cat ./tmp/micro.sfx ./build/index.phar > ./build/appbin && chmod 0755 ./build/appbin
