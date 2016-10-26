# PHP Profiler

[![License](https://poser.pugx.org/tomzx/profiler/license.svg)](https://packagist.org/packages/tomzx/profiler)
[![Latest Stable Version](https://poser.pugx.org/tomzx/profiler/v/stable.svg)](https://packagist.org/packages/tomzx/profiler)
[![Latest Unstable Version](https://poser.pugx.org/tomzx/profiler/v/unstable.svg)](https://packagist.org/packages/tomzx/profiler)
[![Build Status](https://img.shields.io/travis/tomzx/profiler.svg)](https://travis-ci.org/tomzx/profiler)
[![Code Quality](https://img.shields.io/scrutinizer/g/tomzx/profiler.svg)](https://scrutinizer-ci.com/g/tomzx/profiler/code-structure)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/tomzx/profiler.svg)](https://scrutinizer-ci.com/g/tomzx/profiler)
[![Total Downloads](https://img.shields.io/packagist/dt/tomzx/profiler.svg)](https://packagist.org/packages/tomzx/profiler)

`PHP Profiler` is a small library that provides profiling functionality. It uses the [Chrome debugging protocol](https://chromedevtools.github.io/debugger-protocol-viewer/v8/Profiler/) that is part of the Chrome DevTools. This means that you can generate `.cpuprofile`-compatible files that can then be loaded into Chrome profiles in the developer tools.

## Getting started
* In a console, `php composer.phar require tomzx/profiler`

```php
$profiler = new \tomzx\Profiler\StackBasedProfiler();
$profiler->start();

// In your code
$profiler->push('My identifier');
///...
$profiler->pop();

$profile = $profiler->stop();
file_put_contents('test.cpuprofile', json_encode($profile));
```

## License

The code is licensed under the [MIT license](http://choosealicense.com/licenses/mit/). See [LICENSE](LICENSE).