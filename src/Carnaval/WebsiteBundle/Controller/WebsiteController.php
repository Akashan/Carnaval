<?php

namespace Carnaval\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WebsiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('CarnavalWebsiteBundle:Website:index.html.twig', array());
    }
	
	public function presentationAction()
	{
        return $this->render('CarnavalWebsiteBundle:Website:presentation.html.twig', array());	
	}
	
	public function referencesAction()
	{
	
	}
	
	public function catalogueAction()
	{
	
	}
	
	public function calendrierAction()
	{
	
	}
	
	public function galeriesAction()
	{
	
	}
	
	public function voirGaleriesAction($id)
	{
	
	}
	
	public function videosAction()
	{
	
	}
	
	public function voirVideosAction($id)
	{
	
	}
	
	public function contactsAction()
	{
	
	}
	
	public function liensAction()
	{
	
	}
	
}
