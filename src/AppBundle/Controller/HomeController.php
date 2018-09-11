<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class HomeController
 * @package AppBundle\Controller
 *
 *
 */
class HomeController extends Controller
{
    /**
     * Home page angularjs App container 
     *
     * @param Request $request
     * @return mixed
     * @Route("/", name="home_page")
     */
    public function indextAction(Request $request)
    {
        return $this->render('index.html.php');
        
    }
    
    /**
     * Home page angularjs App container 
     *
     * @param Request $request
     * @return mixed
     * @Route("/{entity}/{action}/{sub_action}", name="route_page")
     */
    public function routeAction(Request $request)
    {
        $entity = $request->get('entity');
        $action = $request->get('action');
        $sub_action = $request->get('sub_action');
        
        return $this->render($entity.'/'.$action.'/'.$sub_action.'.php');
        
    }

}
