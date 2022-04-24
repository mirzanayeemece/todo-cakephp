<?php

namespace App\Controller;

use App\Controller\AppContoller;


class StudentsController extends AppController
{
	public function initialize(): void
	{
		parent::initialize();
		$this->loadModel("Students");	
		$this->viewBuilder()->setLayout("student");	
	}

	public function studentsList()
	{
		$students = $this->Students->find()->toList();
		$this->set(compact("students"));
		$this->set("title", "Student List");
	}

	public function addStudent()
	{
		$student = $this->Students->newEmptyEntity();
		if($this->request->is("post")){
			$fileObject = $this->request->getData("profile_image");
			$destination = WWW_ROOT . "img" . DS . $fileObject->getClientFilename();
			$fileObject->moveTo($destination);

			$studentData = $this->request->getData();
			$studentData["profile_image"] = $fileObject->getClientFilename();
			$student = $this->Students->patchEntity($student, $studentData);

			if($this->Students->save($student)){
				$this->Flash->success("saved");
				return $this->redirect(["action" => "studentsList"]);
			} else {
				$this->Flash->error("failed");
			}
		}
		$this->set(compact("student"));
		$this->set("title", "Add Student");
	}

	public function editStudent($id = null)
	{
		$student = $this->Students->get($id, [
			"contain" => []
		]);

		if($this->request->is(["post", "put"])){

			$studentData = $this->request->getData();

			$fileObject = $this->request->getData("profile_image");
			$filename = $fileObject->getClientFilename();

			if(!empty($filename)){
				$destination = WWW_ROOT . "img" . DS . $fileObject->getClientFilename();
				$fileObject->moveTo($destination);
				$studentData["profile_image"] = $fileObject->getClientFilename();
			} else {
				$studentData["profile_image"] = $student->profile_image;
			}
			
			$student = $this->Students->patchEntity($student, $studentData);

			if($this->Students->save($student)){
				$this->Flash->success("updated");
				return $this->redirect(["action" => "studentsList"]);
			} else {
				$this->Flash->error("failed");
			}
		}

		$this->set(compact("student"));
		$this->set("title", "Edit Student");
	}

	public function deleteStudent($id = null)
	{
		$this->request->allowMethod(["post", "delete"]);

		$student = $this->Students->get($id, [
			"contain" => []
		]);

		if($this->Students->delete($student)){
			$this->Flash->success("deleted");
		} else {
			$this->Flash->error("failed");
		}
		return $this->redirect(["action" => "studentsList"]);
	}
}