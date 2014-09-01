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
    $fields->addFieldToTab( 'Root.Image', $uf = new UploadField('MainImage'));
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
    if ($this->MainImageId) {
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