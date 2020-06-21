<?php

namespace App\Controller;

use App\Entity\BlogPost;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;


/**
 * @Route("/blog")
 */
class BlogController extends AbstractController
{

    /**
     * @Route("/showPosts", name="Blog_show")
     */
    public function showPosts()
    {
        $posts=$this->getDoctrine()->getRepository(BlogPost::class)->findAll();
        /** @var  Serializer $serializer */
        $data = $this->get('serializer')->serialize($posts,'json');

        $response=new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    /**
     * @Route("/add", name="Blog_Add",methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function add(Request $request, SerializerInterface $serializer)
    {
//*********************************************
//***********   working Perfectly   ***********
//*********************************************

//        /** @var  Serializer $serializer */
//        $serializer = $this->get('serializer');
//        $result = $serializer->deserialize($request->getContent(), BlogPost::class, 'json');
//        $date = new DateTime();
//        $date->format('Y-m-d H:i:s');
//        $result->setPublished($date);
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($result);
//        $em->flush();
//        return $this->json($result);
//*********************************************
//*********************************************

//*********************************************
//**********   working Perfectly2   ***********
//*********************************************
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->deserialize($request->getContent(), BlogPost::class, 'json', []);
        $jsonContent->setPublished(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $em->persist($jsonContent);
        $em->flush();
        return $this->json($jsonContent);
    }
//*********************************************
//*********************************************

    /**
     * @Route("/delete/{id}", name="Blog_delete" )
     * // methods={"DELETE"} from browser not working
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(BlogPost $blogPost)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($blogPost);
        $em->flush();
        return new JsonResponse(null, Response::HTTP_OK);

    }

    private const POSTS = [
        [
            'id' => 1,
            'slug' => 'a',
            'title' => 'hello world'
        ],
        [
            'id' => 2,
            'slug' => 'b',
            'title' => 'bonjour le monde'
        ],
        ['id' => 3,
            'slug' => 'c',
            'title' => 'holla el mondo'
        ]
    ];

    /**
     * @Route("/list", name="Blog_list")
     */
    public function list()
    {
        return new JsonResponse(self::POSTS);
    }

    /**
     * @Route("/list/{id}", name="Blog_listId",requirements={"id","\d+"})
     */
    public function listById($id)
    {
        return new JsonResponse(self::POSTS[array_search($id, array_column(self::POSTS, "id"))]);
    }


    /**
     * @Route("/survey/{slug}", name="Blog_listSlug")
     */
    public function listBySlug($slug)
    {
        return new JsonResponse(
            self::POSTS[array_search($slug, array_column(self::POSTS, "slug"))]);
    }


}
