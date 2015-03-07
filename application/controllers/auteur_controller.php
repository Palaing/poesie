<?php

class Auteur_Controller extends MY_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auteur');
	}

	public function liste($offset = 0, $limit = 20) 
	{
		$result = $this->Auteur->liste($offset, $limit);
		
		$data = array(
			'title' => 'Tous les auteurs',
			'table' => $this->createtable($result),
			'links' => $this->pagelinks(
				$result,
				$limit,
				$this->Auteur->countAll(), 
				'http://localhost/poesie/index.php/auteur/liste/'
			),
		);
		$this->load->view('table', $data);
	}
	
	public function cherche($nom='')  
	{
		$result = $this->Auteur->cherche($nom);
		$data = array(
			'title' => 'Auteurs: résultats de la recherche de " ' . $nom . ' "',
			'table' => $this->createtable($result),
		);
		$this->load->view('table', $data);
	}

}