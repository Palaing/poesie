<?php

class MY_Controller extends CI_Controller
{	

	public function pagelinks(
			$result, 		// objet-résultat d'une requête, à partir duquel on veut générer la table
			$per_page,	// nombre d'enregistrements par page d'affichage (inférieur ou égal au LIMIT de la requête)
			$count_all, 	// nombre total d'enregistrements dans la table où a été faite la requête (sans LIMIT ni OFFSET)
			$base_url		// base_url nécessaire pour la fonction de pagination
		) {
		$this->load->library('pagination');

		$config['base_url'] = $base_url;
		$config['total_rows'] = $count_all;
		$config['per_page'] = $per_page;

		$this->pagination->initialize($config);

		return $this->pagination->create_links();
	}
	
	public function createtable($result) 
	{
		$this->load->library('table');
		$tmpl = array (
                    'table_open' => '<table class="table table-striped">',
              );				  
		$this->table->set_template($tmpl); 
		return $this->table->generate($result); 
	}
	
}	