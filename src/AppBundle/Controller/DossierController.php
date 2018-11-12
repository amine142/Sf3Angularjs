<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Dossier;
use AppBundle\Entity\Repository\DossierRepository;
use AppBundle\Form\Type\DossierType;
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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Class DossierController
 * @package AppBundle\Controller
 *
 * @RouteResource("dossier")
 */
class DossierController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Gets an individual Dossier
     *
     * @param int $id
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     * @ApiDoc(
     *     output="AppBundle\Entity\Dossier",
     *     statusCodes={
     *         200 = "Returned when successful",
     *         404 = "Return when not found"
     *     }
     * )
     * 
     */
    public function getAction(int $id)
    {
        $dossier = $this->getDossierRepository()->createFindOneByIdQuery($id)->getSingleResult();
        
        if ($dossier === null) {
            return new View(null, Response::HTTP_NOT_FOUND);
        }
        
        $collection = unserialize(base64_decode($dossier->getDocuments()));
        
        $dossier->setDocuments($collection);
        
        return $dossier;
    }

    /**
     * Gets a collection of Dossier
     *
     * @return array
     *
     * @ApiDoc(
     *     output="AppBundle\Entity\Dossier",
     *     statusCodes={
     *         200 = "Returned when successful",
     *         404 = "Return when not found"
     *     }
     * )
     */
    public function cgetAction()
    {
        $dossiers = $this->getDossierRepository()->createFindAllQuery()->getResult();
        foreach ($dossiers as &$dossier){
            $collection = unserialize(base64_decode($dossier->getDocuments()));
            $dossier->setDocuments($collection);
        }
      
        return $dossiers;
    }

    /**
     * @param Request $request
     * @return View|\Symfony\Component\Form\Form
     *
     * @ApiDoc(
     *     input="AppBundle\Form\Type\DossierType",
     *     output="AppBundle\Entity\Dossier",
     *     statusCodes={
     *         201 = "Returned when a new Dossier has been successful created",
     *         404 = "Return when not found"
     *     }
     * )
     */
    public function postAction(Request $request)
    {
        $form = $this->createForm(DossierType::class, null, [
            'csrf_protection' => false,        
        ]);
        
        $form->submit($request->request->all());
        
        if (!$form->isValid()) {
            return $form;
        }

        /**
         * @var $dossier Dossier
         */
        $dossier = $form->getData();
        
        $em = $this->getDoctrine()->getManager();
        $documents = base64_encode(serialize($dossier->getDocuments()));
        $dossier->setDocuments($documents);
        $em->persist($dossier);
        $em->flush();
        
        $routeOptions = [
            'id' => $dossier->getId(),
            '_format' => $request->get('_format'),
        ];

        return $this->routeRedirectView('get_dossiers', $routeOptions, Response::HTTP_CREATED);
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return View|\Symfony\Component\Form\Form
     *
     * @ApiDoc(
     *     input="AppBundle\Form\Type\DossierType",
     *     output="AppBundle\Entity\Dossier",
     *     statusCodes={
     *         204 = "Returned when an existing Dossier has been successful updated",
     *         400 = "Return when errors",
     *         404 = "Return when not found"
     *     }
     * )
     */
    public function putAction(Request $request, int $id)
    {
        /**
         * @var $dossier Dossier
         */
        $dossier = $this->getDossierRepository()->find($id);

        if ($dossier === null) {
            return new View(null, Response::HTTP_NOT_FOUND);
        }
        
        $documents = unserialize(base64_decode($dossier->getDocuments()));
        $dossier->setDocuments($documents);
        $form = $this->createForm(DossierType::class, $dossier, [
            'csrf_protection' => false,
        ]);

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            return $form;
        }

        
        $em = $this->getDoctrine()->getManager();
        $documents = base64_encode(serialize($dossier->getDocuments()));
        $dossier->setDocuments($documents);
        $em->persist($dossier);
        $em->flush();

        $routeOptions = [
            'id' => $dossier->getId(),
            '_format' => $request->get('_format'),
        ];

        return $this->routeRedirectView('get_dossiers', $routeOptions, Response::HTTP_NO_CONTENT);
    }


    /**
     * @param Request $request
     * @param int     $id
     * @return View|\Symfony\Component\Form\Form
     *
     * @ApiDoc(
     *     input="AppBundle\Form\Type\DossierType",
     *     output="AppBundle\Entity\Dossier",
     *     statusCodes={
     *         204 = "Returned when an existing Dossier has been successful updated",
     *         400 = "Return when errors",
     *         404 = "Return when not found"
     *     }
     * )
     */
    public function patchAction(Request $request, int $id)
    {
        /**
         * @var $dossier Dossier
         */
        $dossier = $this->getDossierRepository()->find($id);

        if ($dossier === null) {
            return new View(null, Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(DossierType::class, $dossier, [
            'csrf_protection' => false,
        ]);

        $form->submit($request->request->all(), false);

        if (!$form->isValid()) {
            return $form;
        }

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $routeOptions = [
            'id' => $dossier->getId(),
            '_format' => $request->get('_format'),
        ];

        return $this->routeRedirectView('get_dossiers', $routeOptions, Response::HTTP_NO_CONTENT);
    }


    /**
     * @param int $id
     * @return View
     *
     * @ApiDoc(
     *     statusCodes={
     *         204 = "Returned when an existing Dossier has been successful deleted",
     *         404 = "Return when not found"
     *     }
     * )
     */
    public function deleteAction(int $id)
    {
        /**
         * @var $dossier Dossier
         */
        $dossier = $this->getDossierRepository()->find($id);

        if ($dossier === null) {
            return new View(null, Response::HTTP_NOT_FOUND);
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($dossier);
        $em->flush();

        return new View(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @return DossierRepository
     */
    private function getDossierRepository()
    {
        return $this->get('crv.doctrine_entity_repository.dossiers');
    }
}
