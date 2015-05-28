<?php
/**
* Defines the SupportingProjectPage page type - initial code created by ss generator
*/
class PageWithImageFolder extends PageWithImage implements SeoInformationProvider {

	static $allowed_children = array('PageWithImage');


	public function getImagesForSeo() {
		$result = new ArrayList();
		$pwis = $this->owner->AllChildren()->where("ClassName in (
			'PageWithImage','PageWithImagesFolder')");
		foreach ($pwis->getIterator() as $pwi) {
			if ($pwi->MainImageID > 0) {
				$result->push($pwi->MainImage());
			}
		}
		return $result;
	}


	public function getLinksForSeo() {
		return false;
	}

}

class PageWithImageFolder_Controller extends PageWithImage_Controller {

}
