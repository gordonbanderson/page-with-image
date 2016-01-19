# Page With Image
[![Build Status](https://travis-ci.org/gordonbanderson/page-with-image.svg?branch=continuous_integration)](https://travis-ci.org/gordonbanderson/page-with-image)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gordonbanderson/page-with-image/badges/quality-score.png?b=continuous_integration)](https://scrutinizer-ci.com/g/gordonbanderson/page-with-image/?branch=continuous_integration)
[![Code Coverage](https://scrutinizer-ci.com/g/gordonbanderson/page-with-image/badges/coverage.png?b=continuous_integration)](https://scrutinizer-ci.com/g/gordonbanderson/page-with-image/?branch=continuous_integration)
[![Build Status](https://scrutinizer-ci.com/g/gordonbanderson/page-with-image/badges/build.png?b=continuous_integration)](https://scrutinizer-ci.com/g/gordonbanderson/page-with-image/build-status/continuous_integration)
[![codecov.io](https://codecov.io/github/gordonbanderson/page-with-image/coverage.svg?branch=continuous_integration)](https://codecov.io/github/gordonbanderson/page-with-image?branch=continuous_integration)

[![Latest Stable Version](https://poser.pugx.org/weboftalent/page-with-image/version)](https://packagist.org/packages/weboftalent/page-with-image)
[![Latest Unstable Version](https://poser.pugx.org/weboftalent/page-with-image/v/unstable)](//packagist.org/packages/weboftalent/page-with-image)
[![Total Downloads](https://poser.pugx.org/weboftalent/page-with-image/downloads)](https://packagist.org/packages/weboftalent/page-with-image)
[![License](https://poser.pugx.org/weboftalent/page-with-image/license)](https://packagist.org/packages/weboftalent/page-with-image)
[![Monthly Downloads](https://poser.pugx.org/weboftalent/page-with-image/d/monthly)](https://packagist.org/packages/weboftalent/page-with-image)
[![Daily Downloads](https://poser.pugx.org/weboftalent/page-with-image/d/daily)](https://packagist.org/packages/weboftalent/page-with-image)

[![Dependency Status](https://www.versioneye.com/php/weboftalent:page-with-image/badge.svg)](https://www.versioneye.com/php/weboftalent:page-with-image)
[![Reference Status](https://www.versioneye.com/php/weboftalent:page-with-image/reference_badge.svg?style=flat)](https://www.versioneye.com/php/weboftalent:page-with-image/references)

![codecov.io](https://codecov.io/github/gordonbanderson/page-with-image/branch.svg?branch=continuous_integration)

## Maintainers

* Gordon Anderson (Nickname: nontgor)
	<gordon.b.anderson@gmail.com>

##Introduction

This module provides for rendering subpages as images of folders, which themselves can contain
similar folders.  Images can also be attached to third party module page types and rendered in the
same way.
 
##Documentation

### Provided Page Types
A PageWithImage is container within a PageWithImageFolder.  Both are the same as a standard Page,
but with the addition of a main image (MainImage field).

### Extending Provided Page Types
One can simply extend PageWithImage adding whatever is needed for the subclass as appropriate.
```php
class AnimalPage extends PageWithImage {
	private static $db = array('Name' => 'Varchar');
}
```
The above class AnimalPage will appear when right clicking on a PageWithImageFolder to add a new
subpage.

### Using the AddImageExtension
There are 2 configuration changes required for a Page type that does not already have an attached
image.
* Add the AddImageExtension
* Allow the third party Page type be a child of PageWithImageFolder (otherwise you can't add it)
To do this add a config file, say pagewithimage.yml in your own module or mysite/_config directory
with YML as per the following:

```yml
---
Name: yoursitepagewithimage
After: pagewithimage
---
PageWithImageFolder:
  allowed_children:
    - PageWithImage
    - ThirdPartyPage
ThirdPartyPage:
  extensions:
    - AddImageExtension
```
Repeat for each ThirdPartyPage type that you would like to have an image.

##Requirements
* SilverStripe 3.1

##TODO
* Tests
