<?php
class Libraries extends Controller {
	
	public function addLibrary() {
		$userId = $_SESSION["user"]->id;
		$this->model->addLibrary($userId, $_POST["libName"], 0);
		header('location: ' . URL_WITH_INDEX_FILE . 'home/index');

	}
	
	public function share() {
		$activeLibId = $_SESSION["activeLib"]->id;
		$viewer = $this->model->getUserByEmail($_POST["emailToShare"]);
		$this->model->addPrivilege($viewer->id, $activeLibId, 0);
		header('location: ' . URL_WITH_INDEX_FILE . 'home/index/'.$activeLibId);
	}
	
	public function unshare() {
		$activeLibId = $_SESSION["activeLib"]->id;
		$viewerId = $_POST["userId"];
		$this->model->deletePrivilege($viewerId, $activeLibId);
		header('location: ' . URL_WITH_INDEX_FILE . 'home/index/'.$activeLibId);
	}
	
	public function renameLibrary() {
		$activeLibId = $_SESSION["activeLib"]->id;
		$this->model->renameLibrary($activeLibId, $_POST["newLibName"]);
		header('location: ' . URL_WITH_INDEX_FILE . 'home/index/'.$activeLibId);
	
	}
	
}