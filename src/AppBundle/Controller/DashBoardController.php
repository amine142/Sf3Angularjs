<?php

namespace AppBundle\Controller;

use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\RouteRedirectView;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Class DashBoardController
 * @package AppBundle\Controller
 *
 * @RouteResource("dashboard")
 */
class DashBoardController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Gets an individual Dashboard
     *
     * @param int $id
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     * @ApiDoc(
     *     output="AppBundle\Entity\Dashboard",
     *     statusCodes={
     *         200 = "Returned when successful",
     *         404 = "Return when not found"
     *     }
     * )
     */
    public function getAction()
    {
        
        return [];
    }
    /**
     * Gets individial Menu for logged in User
     *
     * @param int $id User id
     * @return mixed
    
     *
     * @ApiDoc(
     *     statusCodes={
     *         200 = "Returned when successful",
     *         404 = "Return when not found"
     *     }
     * )
     */
    public function getMenuAction()
    {
        
        return [["title" => "dossier", "href" => "dossiers"], ["title" => "affaire", "href"=> "affaire"]];
    }
}
