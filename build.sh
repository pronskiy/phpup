rm -rf ./build/phpup     
rm -rf ./build/index.*
     
box compile
mkdir -p ./build
mv index.phar ./build/

cd build || exit

OS=`uname -a|awk '{print $1}'`
arch=`uname -m|awk '{print $1}'`
case $OS in
    "Darwin" ) curl -o php "https://dl.static-php.dev/static-php-cli/common/php-8.3.6-micro-macos-${arch}.tar.gz" -C -;;
    "Linux" ) curl -o php "https://dl.static-php.dev/static-php-cli/common/php-8.3.6-micro-linux-${arch}.tar.gz" -C -;;
    * ) echo "OS is not supported"
      exit ;;
esac
tar -xvf php
cat ./micro.sfx ./index.phar > ./phpup && chmod 0755 ./phpup
