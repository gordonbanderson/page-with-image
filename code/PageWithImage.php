<?php
/**
* Defines the SupportingProjectPage page type - initial code created by ss generator
*/
class PageWithImage extends Page implements RenderableAsPortlet {


  static $has_one = array(
    'MainImage' => 'Image'
  );


 

  function getCMSFields() {
    $fields = parent::getCMSFields();
    $fields->addFieldToTab( 'Root.Content.Image', new ImageField('MainImage'));
    return $fields;
  }


  public function getPortletTitle() {
    return $this->Title;
  }  


  // FIXME - make this more efficient
  public function getPortletImage() {
    return DataObject::get_by_id('Image', $this->MainImageID);
    
  }
  
  
 
  public function getPortletCaption() {
    return '';
  }

}

class PageWithImage_Controller extends Page_Controller {

}

?>