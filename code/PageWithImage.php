<?php
/**
* Defines the SupportingProjectPage page type - initial code created by ss generator
*/
class PageWithImage extends Page implements RenderableAsPortlet {


  static $has_one = array(
    'MainImage' => 'Image'
  );


  // for rendering thumbnail when linked in facebook
  function getOGImage() {
        return $this->MainImage();
    }
 

  function getCMSFields() {
    $fields = parent::getCMSFields();
    $imagename = _t('PageWithImage.IMAGE', 'Image');
    $fields->addFieldToTab( 'Root.'.$imagename, $uf = new UploadField('MainImage', _t('PageWithImage.MAIN_IMAGE', 'Main Image')));
    $dirname = strtolower($this->ClassName).'s';
    $uf->setFolderName($dirname);
    return $fields;
  }


  public function getPortletTitle() {
    return $this->Title;
  }  


  // FIXME - make this more efficient
  public function getPortletImage() {
    $result = null;
    if ($this->MainImageID) {
      $result = DataObject::get_by_id('Image', $this->MainImageID);
    }
    return $result;
  }
  
  
 
  public function getPortletCaption() {
    return '';
  }

}

class PageWithImage_Controller extends Page_Controller {
  
}