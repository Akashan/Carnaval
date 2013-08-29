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
        return $this->render('CarnavalWebsiteBundle:Website:references.html.twig', array());
    }
	
	public function catalogueAction()
	{
        return $this->render('CarnavalWebsiteBundle:Website:catalogue.html.twig', array());
	}
	
	public function calendrierAction()
	{
        return $this->render('CarnavalWebsiteBundle:Website:calendrier.html.twig', array());
	}
	
	public function galeriesAction()
	{
        return $this->render('CarnavalWebsiteBundle:Website:galeries.html.twig', array());
	}
	
	public function voirGaleriesAction($id)
	{
        return $this->render('CarnavalWebsiteBundle:Website:voirGalerie.html.twig', array());
	}
	
	public function videosAction()
	{
        return $this->render('CarnavalWebsiteBundle:Website:videos.html.twig', array());
	}
	
	public function voirVideosAction($id)
	{
        return $this->render('CarnavalWebsiteBundle:Website:voirVideo.html.twig', array());
	}
	
	public function contactsAction()
	{
        return $this->render('CarnavalWebsiteBundle:Website:contacts.html.twig', array());
	}
	
	public function liensAction()
	{
        return $this->render('CarnavalWebsiteBundle:Website:liens.html.twig', array());
	}
	
}
