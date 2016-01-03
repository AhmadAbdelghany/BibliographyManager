<?php
class References extends Controller {
	
	public function addReference() {
		$userId = $_SESSION["user"]->id;
		$activeLibId = $_SESSION["activeLib"]->id;
		$this->model->addReference($_POST["refAuthor"], $_POST["refTitle"], $_POST["refJournal"], $_POST["refDate"], $activeLibId);
		header('location: ' . URL_WITH_INDEX_FILE . 'home/index/'.$activeLibId);
	}
	
	public function edit($refId) {
		$reference = $this->model->getRegerenceById($refId);
		require APP . 'views/_templates/header.php';
        require APP . 'views/_templates/logo.php'; 
		require APP . 'views/references/edit.php';
        require APP . 'views/_templates/footer.php'; 
	}
	
	public function updateReference() {
		$userId = $_SESSION["user"]->id;
		$activeLibId = $_SESSION["activeLib"]->id;
		$this->model->updateReference($_POST["refAuthor"], $_POST["refTitle"], $_POST["refJournal"], $_POST["refDate"], $_POST["refId"]);
		header('location: ' . URL_WITH_INDEX_FILE . 'home/index/'.$activeLibId);
	}
	
}