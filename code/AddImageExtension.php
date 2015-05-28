<?php

class AddImageExtension extends DataExtension {
	private static $has_one = array(
		'MainImage' => 'Image'
	);


	/*
	Add a Location tab containing the map
	*/
	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab('Root.Image', $uf = new UploadField('MainImage',
			_t('PageWithImage.MAIN_IMAGE', 'Main Image')));
		$uf->setFolderName('pagewithimage');
	}


	public function getPortletTitle() {
		return $this->Title;
	}

	public function getPortletImage() {
		return $this->MainImage;
	}

	public function getPortletCaption() {
		return $this->Title;
	}
}
