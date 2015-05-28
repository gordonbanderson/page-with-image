# Page With Image

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
