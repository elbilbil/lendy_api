<?php

namespace YL\CompanyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get;

class DefaultController extends Controller
{

    /**
     * @Rest\View()
     * @Rest\Post()
     */
    public function indexAction(Request $request)
    {
        return new JsonResponse($request->attributes->all(), Response::HTTP_ACCEPTED);
        //return $this->render('YLCompanyBundle:Default:index.html.twig');
    }
}
