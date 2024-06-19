<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	private $introtext_limit = 200;
	private $titletext_limit = 40;

	//Constructor	
	public function __construct() {
        parent::__construct();
		$this->load->model('Latest_News_Model', 'latest_news_model');		
	}
	
	public function index()
	{
		$data['page_js'] = 'dashboard.js';
		$data['current_breadcrumb_title'] = 'Home';
		//$data['latest_announcements'] = $this->get_latest_announcements();
		//$data['latest_news_article'] = $this->latest_news_model->get_top_latest_news(89); //89 = Joomla Latest News Joomla Article Category Id
		//$data['latest_pub_announce_article'] = $this->latest_news_model->get_top_latest_news(90); //90 = Joomla Latest News Joomla Article Category Id
		
		//$data['latest_news'] = $this->get_latest_news();
		$this->load->view('template/header',$data);
		$this->load->view('home.php',$data);
		$this->load->view('template/footer',$data);
	}

	private function set_iccc_link($old_path){
  	    
		$new_path  = rtrim(str_replace('/icccrt/', '', $old_path), '/');

		return 'https://www.iccc.gov.pg/'.$new_path;
  	    
  	}
	private function get_latest_news()
	{
		$latest_news = $this->latest_news_model->get_latest_news(89); //89 = Joomla Latest News Joomla Article Category Id
		
		//clean and truncate title and intro text
		foreach ($latest_news as $row) {
			$row->introtext = $this->common->truncate(
				$this->common->cleanIntrotext(
					preg_replace("/{[^}]*}/","",$row->introtext)
				)
			,$this->introtext_limit); 

			$row->link = $this->common->get_joomla_article_route($row->id, $row->catid);
			
			$row->link = $this->set_iccc_link($row->link);
			
			$row->title = $this->common->truncate(htmlspecialchars($row->title),$this->titletext_limit);			
			$row->id = htmlspecialchars($row->id);
		}

		return $latest_news;
		
	}
	private function get_latest_announcements()
	{
		$latest_announcements = $this->latest_news_model->get_latest_news(90); //90 = Joomla Public Notices Joomla Article Category Id
		$data = array();

		//clean and truncate title and intro text
		foreach ($latest_announcements as $row) {
			$row->introtext = $this->common->truncate(
				$this->common->cleanIntrotext(
					preg_replace("/{[^}]*}/","",$row->introtext)
				)
			,$this->introtext_limit); 

			$row->link = $this->common->get_joomla_article_route($row->id, $row->catid);
			
            $row->link = $this->set_iccc_link($row->link);
            
			$row->title = $this->common->truncate(htmlspecialchars($row->title),$this->titletext_limit);			
			$row->id = htmlspecialchars( $row->id );
		}

		return $latest_announcements;
	}


}
