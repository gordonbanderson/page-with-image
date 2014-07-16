<?php
/**
* Defines the SupportingProjectPage page type - initial code created by ss generator
*/
class PageWithImageFolder extends PageWithImage {

	static $allowed_children = array('PageWithImage', 'PageWithImageFolder');

}

class PageWithImageFolder_Controller extends PageWithImage_Controller {

}