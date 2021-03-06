<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    /**
     * Action : List all blog posts
     */
    public function indexAction()
    {
        $posts = $this->getDoctrine()->getRepository('AdminBundle:Post')
            ->findBy([], ['createdAt' => 'ASC']);

        return $this->render('AppBundle:Blog:index.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * Action : Show a blog post
     *
     * @param  string $slug
     * @return Response
     */
    public function showAction($slug)
    {
        $post = $this->getDoctrine()->getRepository('AdminBundle:Post')->findOneBySlug($slug);
        $posts = $this->getDoctrine()->getRepository('AdminBundle:Post')
            ->findBy([], ['createdAt' => 'ASC'])
        ;


        $previousPost = null;
        $nextPost = null;

        foreach ($posts as $key => $value) {
            if ($post->getId() === $value->getId()) {

                if (isset($posts[$key-1])) {
                    $previousPost = $posts[$key-1];
                }

                if (isset($posts[$key+1])) {
                    $nextPost = $posts[$key+1];
                }

                break;
            }
        }

        return $this->render('AppBundle:Blog:show.html.twig', [
            'post' => $post,
            'nextPost' => $nextPost,
            'previousPost' => $previousPost
        ]);
    }

}
