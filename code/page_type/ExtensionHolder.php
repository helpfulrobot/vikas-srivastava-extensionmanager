<?php
class ExtensionHolder extends Page {

}

class ExtensionHolder_Controller extends Page_Controller {

	/**
	 * Setting up the form.
	 *
	 * @return Form .
	 */
	public function UrlForm() {
		
		define('SPAN', '<span class="required">*</span>');
		
		if(!Member::currentUser()) return Security::permissionFailure();
		
		$fields = new FieldList(
			new TextField ('Url', 'Please Submit Read-Only Url of your Extension Repository'. SPAN) 
		);
		$actions = new FieldList(
			new FormAction('submitUrl', 'Submit')
		);
		$validator = new RequiredFields('URL');
		return new Form($this, 'UrlForm', $fields, $actions, $validator);
	}

	/**
	 * The form handler.
	 */
	public function submitUrl($data, $form) {
		$url = $data['Url'];
		
		if(empty($url) || substr($url,0, 4) != "http") {
			$form->sessionMessage(_t('ExtensionHolder.BADURL','Please enter a valid URL'), 'Error');
			return $this->redirectBack();
		}
		
		$json = new JsonHandler();
		$jsonData = $json->cloneJson($url);
		
		if($jsonData) {
			$saveJson = $json->saveJson($url,$jsonData);
		} else {
   				$form->sessionMessage(_t('ExtensionHolder.BADURL','Sorry we could not find any composer.json file on given url.'), 'Error');
		}			
		
		if($saveJson) {
			$form->sessionMessage(_t('ExtensionHolder.THANKSFORSUBMITTING','Thank you for your submission'),'good');
		}
		
		$this->redirectBack();
	}

} 