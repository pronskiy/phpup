rm -rf ./build/phpup     
rm -rf ./build/index.*
       
box compile
mkdir -p ./build
mv index.phar ./build/
  
# shellcheck disable=SC2164
cd build 
curl -O https://dl.static-php.dev/static-php-cli/common/php-8.3.6-micro-macos-aarch64.tar.gz -C -
tar -xvf php-8.3.6-micro-macos-aarch64.tar.gz
cat ./micro.sfx ./index.phar > ./phpup && chmod 0755 ./phpup
