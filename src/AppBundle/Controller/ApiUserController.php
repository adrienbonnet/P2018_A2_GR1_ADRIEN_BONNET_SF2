<?php


namespace AppBundle\Controller;

use AppBundle\Entity\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class apiController
 * @package AppBundle\Controller
 *
 * @Route("/api")
 */
class UserController extends Controller
{
    /**
     * @route("/user/{id}",name="api_user", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function userAction($id = null)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var ArticleRepository $repo */
        $repo = $em->getRepository('AppBundle:User');

        $articles = $repo->findApi();
        //var_dump($id);die;
        return new JsonResponse($articles);
    }
}