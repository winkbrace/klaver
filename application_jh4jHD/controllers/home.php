<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{

	public function index()
	{
	    //$this->poule = new Poule(); // for editor
	    
		// fetch the pouleOverviewViews as string in $data to pass on to homeView
	    foreach (array(1, 2) as $pouleId)
	    {
	    	$poule = $this->poule->init($pouleId);
		    $rankData['ranking'] = $poule->getRanking();
		    $rankData['poulename'] = $poule->getPouleName();
		    $data['pouleRanking'.$pouleId] = $this->load->view('pouleRankingView', $rankData, true);
	    }
	    
	    $this->load->view('headerView');
		$this->load->view('homeView', $data);
		$this->load->view('footerView');
	}
}

/* Location: ./application/controllers/home.php */